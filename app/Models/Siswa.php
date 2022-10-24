<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;
use App\Models\Projek;

class Siswa extends Model
{
    use HasFactory;
protected $fillable = [//tabel yang dapat diisi data
    'nama',
    'alamat',
    'jenis_kelamin',
    'email',
    'foto',
    'about'
];
    protected $table = 'siswa';

    public function kontak(){
        return $this->hasMany(Kontak::class,'siswa_id','id');
    }
    public function project(){
        return $this->hasMany('App\Models\Projek','id_siswa');
    }
}
