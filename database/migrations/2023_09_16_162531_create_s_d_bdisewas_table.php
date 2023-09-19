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
        Schema::create('s_d_bdisewas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sdb');
            $table->foreign('id_sdb')->references('id')->on('s_d_b_s')->onDelete('cascade');
            $table->unsignedBigInteger('id_nasabah');
            $table->foreign('id_nasabah')->references('id')->on('nasabahs')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_d_bdisewas');
    }
};
