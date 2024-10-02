<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghapusan extends Model
{
    use HasFactory;
    protected $table = "penghapusans";
    protected $fillable = ['tanggal','nama_aset','jumlah_hapus','kondisi','keterangan'];
    
    public function maset()
    {
        return $this->belongsTo(maset::class,'nama_aset');
    }
}
