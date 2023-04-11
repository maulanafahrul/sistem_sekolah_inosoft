<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id');
            $table->integer('latihan_satu');
            $table->integer('latihan_dua');
            $table->integer('latihan_tiga');
            $table->integer('latihan_empat');
            $table->integer('ulangan_harian_satu');
            $table->integer('ulangan_harian_dua');
            $table->integer('ulangan_tengah_semester');
            $table->integer('ulangan_semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};
