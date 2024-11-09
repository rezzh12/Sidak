<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePindahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained();
            $table->date('tgl_pindah');
            $table->string('alasan',200);
            $table->string('foto_ktp',100);
            $table->string('foto_kk',100);
            $table->string('foto_pas',100);
            $table->string('pelapor',50);
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
        Schema::dropIfExists('pindahs');
    }
}
