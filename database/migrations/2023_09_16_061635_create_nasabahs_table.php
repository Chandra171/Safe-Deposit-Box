<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('no_rek')->unique();
            $table->string('nama_nasabah');
            $table->string('phone')->nullable();
            $table->text('alamat')->nullable();
            $table->string('ktp');
            $table->string('foto');
            $table->tinyInteger('status')->default('0')->comment('0=belum diverif, 1=verif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabahs');
    }
};
