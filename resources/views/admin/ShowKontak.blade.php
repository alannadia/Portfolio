@if($kontak->isEmpty())
<h6 class="text-center">Siswa Belum Memiliki Data Kontak</h6>
@else
@foreach($kontak as $item) 
<div class="card shadow mb-4">
            <div class="card-body">
               {{ $item->jenis->jenis_kontak }} : {{ $item->deskripsi}}
            </div>
        </div>  
@endforeach
@endif