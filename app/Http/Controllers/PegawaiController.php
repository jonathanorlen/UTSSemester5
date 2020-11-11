<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PegawaiController extends Controller
{
    public function index(){
        $data = DB::table("pegawai")->paginate(10);
        return view('backend.pages.daftar_pegawai',['pegawai'=>$data]);
    }

    public function tambah(){
        $data = DB::table("pegawai")->paginate(10);
        return view('backend.pages.tambah_pegawai',['pegawai'=>$data]);
    }

    public function store(Request $request){
        $insert = DB::table("pegawai")
            ->insert([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kota' => $request->kota,
            ]);
        return redirect()->route('home');
    }

    public function edit($id){
        $data = DB::table("pegawai")
                ->where('id',$id)
                ->first();
         return view('backend.pages.tambah_pegawai',['pegawai'=>$data]);
    }

    public function update(Request $request, $id){
        DB::table('pegawai')
            ->where('id',$id)
            ->update([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kota' => $request->kota
            ]);
        return redirect()->route('home');
    }

    public function delete($id){
        DB::table('pegawai')
            ->where('id',$id)
            ->delete();

        return redirect()->route('home');
    }
}
