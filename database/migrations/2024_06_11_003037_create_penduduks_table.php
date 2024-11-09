<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('k_k_s_id')->constrained();
            $table->string('nik',16)->unique();
            $table->string('nama',50);
            $table->string('tempat_lahir',30);
            $table->date('tgl_lahir');
            $table->string('gender',15);
            $table->string('agama',15);
            $table->string('pendidikan',15);
            $table->string('kawin',10);
            $table->string('pekerjaan',30);
            $table->string('status',20);
            $table->string('rt',3);
            $table->string('rw',3);
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
        Schema::dropIfExists('penduduks');
    }
}
