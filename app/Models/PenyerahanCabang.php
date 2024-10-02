<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyerahanCabang extends Model
{
    use HasFactory;
    protected $table = "penyerahancabangs";
    protected $fillable = ['tanggal','nama_cabang','nama_aset','jumlah','satuan','kondisi'];
    
    public function mcabang()
    {
        return $this->belongsTo(mcabang::class,'nama_cabang');
    }
    public function maset()
    {
        return $this->belongsTo(maset::class,'nama_aset');
    }
}
