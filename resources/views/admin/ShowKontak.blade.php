@if($kontak->isEmpty())
<h6 class="text-center">Siswa Belum Memiliki Data Kontak</h6>
@else
@foreach($kontak as $item) 
<div class="card shadow mb-4">
            <div class="card-body">
               {{ $item->jenis->jenis_kontak }} : {{ $item->deskripsi}}
            </div>
<div class="card-footer">
    <a href="{{ route ('MasterContact.edit', $item->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-user-edit"></i></a>
    <a href="{{ route ('MasterKontak.hapus',$item->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
</div> 
        </div> 

@endforeach
@endif