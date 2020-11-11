@extends('backend.layouts.app')
@section('title', 'Gallery')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"></div>
            </div>
        </div>
        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade" role="alert">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="row pl-4 pr-4 pt-4">
                        <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <form action="{{ route('mahasiswa-search') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                  <input type="text" name="search" class="form-control" placeholder="" aria-label="" value="{{request()->get('search')}}">
                                  <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" type="button"><i class="fa fa-search"></i> Search</button>
                                  </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <a href="{{route('mahasiswa-create')}}" class="btn btn-icon btn-lg btn-primary float-right"><i
                                    class="far fa-edit"></i>
                                Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index=>$item)
                                    <tr>
                                        <td><img src="{{ url('images/mahasiswa/'.$item->foto) }}" alt="" width="120px"></td>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->prodi }}</td>
                                        <td>
                                            <a href="{{route('mahasiswa-edit',[$item->nim])}}"
                                                class="btn btn-icon btn-success"><i class="fas fa-pencil-alt"
                                                    data-toggle="tooltip" title="Edit Gallery Category"></i></a>
                                            <button data-confirm="Realy?|Do you want to continue to delete this data?"
                                                data-confirm-yes="window.location ='{{route('mahasiswa-delete',$item->nim)}}'"
                                                class="btn btn-icon btn-danger" data-toggle="tooltip"
                                                title="Delete Gallery Category"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection

@push('page-scripts')

@endpush
