@extends('admin.app')
@section('title','Edit Project')
@section('content-title','Edit Projek')
@section('content')
<a class="btn btn-success mb-3" href="{{ route('MasterProject.index') }}">Kembali</a>
<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Projek</h6>
        </div>
        <div class="card-body">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
<form  method="post" enctype="multipart/form-data" action="{{ route('MasterProject.update',$data->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama }}" disabled>
        <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
    </div>
    <div class="form-group">
        <label for="nama_projek">Nama Projek</label>
        <input type="text" class="form-control" id="nama_projek" name="nama_projek" value="{{old('nama_projek', $data->nama_projek)}}">
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal',$data->tanggal)}}">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input class="form-control py-5" id="deskripsi" name="deskripsi" value="{{old('deskripsi',$data->deskripsi)}}">
    </div>
    <div class="form-group">
        <label for="foto">Foto Siswa</label>
        <input type="file" class="form-control file" id="foto" name="foto" value="{{old('foto')}}">
        
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Simpan">
        <a href="{{ route('MasterProject.index') }}" class="btn btn-danger">Batal</a>
    </div>
</form>
</div>   
</div> 
    </div>
</div>
@endsection