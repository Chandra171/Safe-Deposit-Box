<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDBdisewa extends Model
{
    use HasFactory;

    protected $table = 's_d_bdisewas';
    protected $fillable = ['id_sdb', 'id_nasabah', 'status'];

    public function sdb(){
        return $this->belongsTo(SDB::class, 'id_sdb');
    }
    public function nasabah(){
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }
}
