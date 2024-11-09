<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk',16);
            $table->string('kepala',50);
            $table->string('rt',3);
            $table->string('rw',3);
            $table->string('desa',30);
            $table->string('kecamatan',30);
            $table->string('kabupaten',30);
            $table->string('provinsi',30);
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
        Schema::dropIfExists('k_k_s');
    }
}
