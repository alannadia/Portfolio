@extends('admin.app')
@section('title','Master Siswa')
@section('content-title','Master Siswa')
@section('content')
<a class="btn btn-primary " href="{{ route ('MasterSiswa.create')}}">Tambah Data</a>
<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
    <!-- <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6> -->
</div>
<div class="card-body">
<table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <body>
        @foreach($data as $i => $item)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $item ->nama }}</td>
                <td>{{ $item ->jenis_kelamin }}</td>
                <td>{{ $item ->email }}</td>
                <td>
                <a href="{{ route ('MasterSiswa.show', $item->id)}}" class="btn btn-info btn-circle"><i class="fas fa-info-circle"></i></a>
                <a href="{{ route ('MasterSiswa.edit', $item->id)}}" class="btn btn-warning btn-circle"><i class="fas fa-user-edit"></i></a>
                <a href="{{ route ('MasterSiswa.hapus', $item->id)}}" class="btn btn-danger btn-circle"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </body>
    </table>
   
</div>   
</div>
    </div>
</div>
    
@endsection