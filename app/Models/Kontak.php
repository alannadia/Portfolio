<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\JenisKontak;
class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
     'siswa_id',
     'jenis_id',
     'deskripsi',

    ];

    protected $table = 'kontak';

    public function siswa(){
        return$this->belongsTo(Siswa::class,'siswa_id','id');
    }
    public function jenis(){
        return$this->belongsTo(JenisKontak::class,'jenis_id','id');
    }
    
}
