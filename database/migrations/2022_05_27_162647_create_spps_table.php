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
        Schema::create('spps', function (Blueprint $table) {
            $table->id('id_spp');
            $table->string('bulan_pembayaran')->nullable();
            $table->foreign('id_siswa')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_admin');
            $table->foreign('id_bulan')->references('id_bulan')->on('month')->onDelete('cascade');
            $table->integer('nominal');
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
        Schema::dropIfExists('spps');
    }
};
