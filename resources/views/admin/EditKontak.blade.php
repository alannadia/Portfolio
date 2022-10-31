@extends('admin.app')
@section('title','Edit Kontak')
@section('content-title','Edit Kontak')
@section('content')
<a class="btn btn-success mb-3" href="{{ route('MasterContact.index') }}">Kembali</a>
<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kontak</h6>
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
<form  method="post" enctype="multipart/form-data" action="{{ route('MasterContact.update',$data->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama }}" disabled>
        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
    </div>
    <div class="form-group">
          <label for="jenis_kontak" class="form-label">Jenis Kontak</label>
          <select class="form-select form-select-lg form-control" aria-label="Default select example" id="jenis_kontak" name="jenis_kontak">
            @foreach ($jenis_kontak as $jenis)
            <option value="{{ $jenis->id }}" >{{ $jenis->jenis_kontak }}</option>             
            @endforeach
          </select>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input class="form-control pt-5 pb-5" id="deskripsi" name="deskripsi" value="{{old('deskripsi')}}">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Simpan">
        <a href="{{ route('MasterContact.index') }}" class="btn btn-danger">Batal</a>
    </div>
</form>
@endsection