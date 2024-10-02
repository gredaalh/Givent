<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcabang extends Model
{
    use HasFactory;
    protected $fillable = 
    [
    'nama_cabang',
    'alamat',
     ];
     public function penyerahanpegawai()
     {
        return $this->hasMany(penyerahanpegawai::class);
     }
     public function penyerahancabang()
     {
        return $this->hasMany(penyerahancabang::class);
     }
}
