<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyerahanPegawai extends Model
{
    use HasFactory;
    protected $table = "penyerahanpegawais";
    protected $fillable = ['tanggal','name','nama_aset','jumlah','satuan','kondisi'];

    public function users()
    {
        return $this->belongsTo(user::class,'name');
    }
    public function maset()
    {
        return $this->belongsTo(maset::class,'nama_aset');
    }
}
