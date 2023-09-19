<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDB extends Model
{
    use HasFactory;

    protected $table = 's_d_b_s';
    protected $fillable = ['no_sdb', 'ukuran', 'no_kunci', 'status'];

    public function kunjungan(){
        $this->hasOne(Kunjungan::class, 'kunjungan_id');
    }
}
