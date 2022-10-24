@extends('admin.app')
@section('title','Edit Siswa')
@section('content-title','Edit Siswa')
@section('content')
<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4 mt-3">
<div class="card-body">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form  method="post" enctype="multipart/form-data" action="{{ route('MasterSiswa.update',$data->id) }}">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-select form-control" id="jenis_kelamin" name="jenis_kelamin">
  <option value="Perempuan" @if( $data->jenis_kelamin == "Perempuan") selected @endif >Perempuan</option>
  <option value="Laki-laki" @if( $data->jenis_kelamin == "laki-laki") selected @endif >Laki-laki</option>
</select>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
    </div>
    <div class="form-group">
        <label for="about">About</label>
        <input class="form-control pt-5 pb-5" id="about" name="about" value="{{$data->about}}">
    </div>
    <div class="form-group">
        <label for="foto">Foto Siswa</label>
        <input type="file" class="form-control file" id="foto" name="foto" value="{{$data->foto}}">
    </div>
    <img src="{{ asset('/template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Simpan">
        <a href="{{ route('MasterSiswa.index') }}" class="btn btn-danger">Batal</a>
    </div>
</form>
</div>   
</div> 
    </div>
</div>
@endsection