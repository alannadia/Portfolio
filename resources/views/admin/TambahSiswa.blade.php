@extends('admin.app')
@section('title','Tambah Siswa')
@section('content-title','Tambah Siswa')
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
                <form method="post" enctype="multipart/form-data" action="{{ route('MasterSiswa.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option selected></option>
                            <option @if(old('jenis_kelamin')=="perempuan" )) selected @endif value="perempuan">Perempuan</option>
                            <option @if(old('jenis_kelamin')=="Laki-laki" )) selected @endif value="Laki-laki">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <input class="form-control pt-5 pb-5" id="about" name="about" value="{{old('about')}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="file" class="form-control file" id="foto" name="foto" value="{{old('foto')}}">

                    </div>
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