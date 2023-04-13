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
            $table->foreignId('siswa_id');
            $table->foreignId('mata_pelajaran_id');
            $table->float('latihan_1');
            $table->float('latihan_2');
            $table->float('latihan_3');
            $table->float('latihan_4');
            $table->float('ulangan_harian_1');
            $table->float('ulangan_harian_2');
            $table->float('ulangan_tengah_semester');
            $table->float('ulangan_semester');
            $table->float('totol_nilai')->nullable();
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
