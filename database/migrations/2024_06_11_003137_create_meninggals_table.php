<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeninggalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained();
            $table->date('tgl_meninggal');
            $table->string('sebab',100);
            $table->string('foto_ktp',100);
            $table->string('foto_kk',100);
            $table->string('sk_kematian',100);
            $table->string('ktp_pelapor',100);
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
        Schema::dropIfExists('meninggals');
    }
}
