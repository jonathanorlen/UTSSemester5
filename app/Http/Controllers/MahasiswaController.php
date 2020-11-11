<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;
use Str;
use Exception;
use Storage;

class MahasiswaController extends Controller
{   
    private function rules($id = null){
        $validation =  [
            'nama'      =>  'required',
            'alamat'    =>  'required',
            'prodi'     =>  'required'
        ];

        if($id == null){
            $validation['nim'] = 'required|integer|unique:mahasiswas';
            $validation['foto'] ='required|image|mimes:jpeg,png,jpg,gif,svg';
        }

        return $validation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Mahasiswa::get();
        return view('backend.pages.daftar_mahasiswa',$data);
    }
    
    public function search(Request $req)
    {
        $data['data'] = Mahasiswa::where('nim', 'like', '%' . $req->search . '%')
                                ->orWhere('nama', 'like', '%' . $req->search . '%')
                                ->orWhere('alamat', 'like', '%' . $req->search . '%')
                                ->orWhere('prodi', 'like', '%' . $req->search . '%')
                                ->get();
        return view('backend.pages.daftar_mahasiswa',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.tambah_mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $this->validate($request,$this->rules());

        try{
            $data['foto']= $this->upload_image($request->file('foto'),null);
            $insert = Mahasiswa::create($data);
            return redirect()->route('mahasiswa')->withSuccess('Mahasiswa Created');
        }catch(Exception $e) {
            return redirect()->route('mahasiswa')->withError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {   
        $data['data'] = $mahasiswa; 
        return view('backend.pages.tambah_mahasiswa',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $this->validate($request,$this->rules($mahasiswa->nim));
        $data['nim'] = $request->nim;
        if($request->hasfile('foto')){
            $data['foto']= $this->upload_image($request->file('foto'),$mahasiswa->foto);
        }
        
        try{
            $mahasiswa->update($data);
            return redirect()->route('mahasiswa')->withSuccess('Mahasiswa Updated');
        }catch(Exception $e) {
            return redirect()->route('mahasiswa')->withError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try{
            $this->delete_image($mahasiswa->foto);
            $mahasiswa->delete();
            return redirect()->back()->withSuccess('Mahasiswa Deleted');
        }catch(Exception $e) {
            return redirect()->back()->withError($e);
        }
    }

    private function upload_image($image,$old_image = null){
        $path = base_path('public/images/mahasiswa/');
        $path_old_image = $path.$old_image;
        if($old_image && file_exists($path_old_image) && ($old_image != 'default.jpg')){
            unlink($path_old_image);
        }
        $image_name = Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move($path, $image_name);
        return $image_name;
    }

    private function delete_image($image){
        $image_path = "images/mahasiswa/".$image;
        
        if(File::exists($image_path)){
            File::delete($image_path);
        }
    }
}
