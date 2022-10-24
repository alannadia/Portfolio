@extends('admin.app')
@section('title','Show Siswa')
@section('content-title','Show Siswa')
@section('content')
<div class="row">
    <div class="col-lg-4">
    <div class="card shadow mb-4">
        <div class="card-body text-center">
            <img src="{{asset('/template/img/'.$data->foto)}}" width="200" class="rounded-circle">
            <h5>{{ $data->nama }}</h5>
            <h6>{{ $data->email }}</h6>
            <h6>{{ $data->alamat }}</h6>
        </div>
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>Kontak Siswa</h6>
            </div>
            <div class="card-body">
                @foreach($kontak as $item)
               {{ $item->jenis->jenis_kontak }} : {{ $item->deskripsi}}
                @endforeach
            </div>
        </div>
</div>
<div class="col-lg-8">
<div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i>About Siswa</h6>
            </div>
            <div class="card-body">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">{{ $data->about }}</p>
                </blockquote>
            </div>   
</div>
<div class="card-shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-folder-open"></i>Projek Siswa</h6>
</div>
<div class="card-body">
@if($projek->isEmpty())
<h6 class="text-center">Siswa Belum Memiliki Project</h6>
@else
@foreach($projek as $item) 
<ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold" style="font-weight:bold ;">{{ $item->nama_projek }}</div>
      {{ $item->deskripsi }}
    </div>
    <span class="badge bg-success rounded-pill" style="color:beige">{{ $item->tanggal }}</span>
  </li>
</ol>  

@endforeach
@endif
</div>
</div>
    </div>
</div>
@endsection