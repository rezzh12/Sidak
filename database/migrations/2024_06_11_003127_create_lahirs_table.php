<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLahirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('k_k_s_id')->constrained();
            $table->string('nama',50);
            $table->string('tempat_lahir',30);
            $table->date('tgl_lahir');
            $table->string('gender',15);
            $table->string('foto_sbidan',15);
            $table->string('foto_kk',15);
            $table->string('foto_ktp',15);
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
        Schema::dropIfExists('lahirs');
    }
}
