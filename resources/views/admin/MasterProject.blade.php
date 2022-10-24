@extends('admin.app')
@section('title','Master Project')
@section('content-title','Master Project')
@section('content')
<div class="row">
    <div class="col-lg-4">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
</div>
<div class="card-body">
<table class="table">
        <thead>
            <tr>
                <th scope="col">NAMA</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        @foreach($data as  $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td class="text-center">
                <a  onclick="show('{{ $item->id }}')" class="btn btn-sm btn-primary "><i class="fas fa-folder-open"></i></a>
            <a href="{{ route ('MasterProject.create')}}?siswa={{ $item->id }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="card-footer d-flex justify-content-end
    "></div>
</div> 
</div>
    </div>
    <div class="col-lg-8">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Projek Siswa</h6>
            </div>
            <div  id= "project" class="card-body">
           <h6 class="text-center"> Pilih siswa terlebih dahulu</h6>
        </div>
               
</div>
    </div>
   
</div>
<script>
    function show(id){
        $.get('/admin/MasterProject/'+id,function(data){
            $('#project').html(data)
            // console.log(data)
        })
    }
</script>
@endsection