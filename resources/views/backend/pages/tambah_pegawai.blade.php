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
              <div class="breadcrumb-pegawai">Dashboard</div>
              <div class="breadcrumb-pegawai">Events</div>
              <div class="breadcrumb-pegawai active">Form</div>
          </div> --}}
      </div>
      <div class="section-body">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Form</h4>
                  </div>
                  <form action="{{isset($pegawai)?route('update',$pegawai->id):route('store')}}"
                      method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Nama</label>
                                      <input type="text" name="nama" id="nama"
                                          class="form-control @error('nama') is-invalid @enderror" value="{{(isset($pegawai->nama))?$pegawai->nama:old('nama')}}">
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
                                      <label>Tanggal</label>
                                      <input type="date" name="tanggal_lahir" id="image"
                                          class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{(isset($pegawai->tanggal_lahir))?$pegawai->tanggal_lahir:''}}">
                                      @error('tanggal_lahir')
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
                                      <label>kota</label>
                                      <input type="text" name="kota" id="kota"
                                          class="form-control @error('kota') is-invalid @enderror" value="{{(isset($pegawai->kota))?$pegawai->kota:''}}">
                                      @error('kota')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                        {{-- <div class="form-group">
                            <label>Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="">Select Status</option>
                                <option value="active" {{(isset($pegawai->status))?($pegawai->status == 'active')?'selected':'':''}}>Active</option>
                                <option value="non active" {{(isset($pegawai->status))?($pegawai->status == 'non active')?'selected':'':''}}>Non Active</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div> --}}
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
