<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mvendor extends Model
{
    use HasFactory;
    protected $table = "mvendors";
    protected $fillable = 
    ['nama_vendor','nama_principalsales','nomorhp','alamat',];

    public function maset()
    {
       return $this->hasMany(maset::class);
    }
}
