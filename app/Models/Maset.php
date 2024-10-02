<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Maset extends Model
{
    use HasFactory;
    protected $table = "masets";
    protected $fillable = ['tanggal','id_aset','nama_aset','kategori','nama_vendor','satuan', 'jumlah', 'harga_satuan', 'harga_total'];

    public static function generateNextCode()
    {
        $lastNumber = DB::table('masets')->max('id_aset');
        $lastNumber = ($lastNumber) ? intval(substr($lastNumber, -3)) + 1 : 1;

        $tahun = substr(now()->year, -2); // 2 angka belakang dari tahun
        $bulan = str_pad(now()->month, 2, '0', STR_PAD_LEFT); // 2 angka dari bulan
        $nomorBerurutan = str_pad($lastNumber, 3, '0', STR_PAD_LEFT);

        return "AS{$tahun}/{$bulan}/{$nomorBerurutan}";
    }
    public function getHargaTotalAttribute()
    {
        return $this->jumlah * $this->harga_satuan;
    }

    public function penyerahanpegawai()
    {
        return $this->hasMany(penyerahanpegawai::class);
    }
    public function penyerahancabang()
    {
        return $this->hasMany(penyerahancabang::class);
    }

    public function penghapusan()
    {
        return $this->hasMany(Penghapusan::class);
    }
        public function mvendor()
    {
        return $this->belongsTo(mvendor::class,'nama_vendor');
    }
}
