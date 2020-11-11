@extends('backend.layouts.app')
@section('title', 'Events Form')
@section('content')
<style>
  .ratio {
      width: 100%;
      padding-top: 100%;
      /* 1:1 Aspect Ratio */
      position: relative;
      /* If you want text inside of it */
      background-size: cover;
      background-position: center
  }

</style>

<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Form</h1>
          {{-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-data">Dashboard</div>
              <div class="breadcrumb-data">Events</div>
              <div class="breadcrumb-data active">Form</div>
          </div> --}}
      </div>
      <div class="section-body">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Form</h4>
                  </div>
                  <form action="{{isset($data)?route('mahasiswa-update',$data->nim):route('mahasiswa-store')}}"
                      method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nim</label>
                                    <input type="number" name="nim" id="nim"
                                        class="form-control @error('nim') is-invalid @enderror" value="{{(isset($data->nim))?$data->nim:old('nim')}}">
                                    @error('nim')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Nama</label>
                                      <input type="text" name="nama" id="nama"
                                          class="form-control @error('nama') is-invalid @enderror" value="{{(isset($data->nama))?$data->nama:old('nama')}}">
                                      @error('nama')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Alamat</label>
                                      <input type="text" name="alamat" id="image"
                                          class="form-control @error('alamat') is-invalid @enderror" value="{{(isset($data->alamat))?$data->alamat:old('alamat')}}">
                                      @error('alamat')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Jurusan</label>
                                      <input type="text" name="prodi" id="prodi"
                                          class="form-control @error('prodi') is-invalid @enderror" value="{{(isset($data->prodi))?$data->prodi:old('prodi')}}">
                                      @error('prodi')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto" id="foto"
                                        class="form-control @error('foto') is-invalid @enderror" value="{{(isset($data->foto))?$data->foto:''}}">
                                    @error('foto')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </section>
</div>

@endsection

@push('after-scripts')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endpush
