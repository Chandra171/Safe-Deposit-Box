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
        Schema::create('s_d_b_s', function (Blueprint $table) {
            $table->id();
            $table->integer('no_sdb')->unique();
            $table->string('ukuran');
            $table->integer('no_kunci');
            $table->tinyInteger('status')->default('0')->comment('0=belum disewa, 1=disewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_d_b_s');
    }
};
