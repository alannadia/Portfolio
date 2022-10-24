@if($data->isEmpty())
<h6 class="text-center">Siswa Belum Memiliki Project</h6>
@else
@foreach($data as $item) 
<ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold" style="font-weight:bold ;">{{ $item->nama_projek }}</div>
      {{ $item->deskripsi }}
    </div>
    <span class="badge bg-success rounded-pill" style="color:beige">{{ $item->tanggal }}</span>
  </li>
</ol>  
<div class="card-footer">
    <a href="{{ route ('MasterProject.edit', $item->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-user-edit"></i></a>
    <a href="{{ route('MasterProject.hapus', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
</div>     

@endforeach
@endif