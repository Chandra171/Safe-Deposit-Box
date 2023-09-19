<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungans';
    protected $fillable = ['id_sdb', 'id_user', 'id_nasabah', 'jam_masuk', 'jam_keluar'];

    public function sdb(){
        return $this->belongsTo(SDB::class, 'id_sdb');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function nasabah(){
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }
}
