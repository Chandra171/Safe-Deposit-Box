<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabahs';
    protected $fillable = ['no_rek', 'nama_nasabah', 'phone', 'alamat', 'ktp', 'foto', 'status'];

    public function kunjungan(){
        $this->hasMany(Kunjungan::class, 'kunjungan_id');
    }
}
