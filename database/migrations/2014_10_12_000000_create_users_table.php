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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->enum('hak_akses', ['1', '2'])->default('2');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('kelas', ['1', '2','3', '4','5', '6'])->default('1');
            $table->string('jenis_kelamin')->nullable();
            $table->Text('agama')->nullable();
            $table->mediumText('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->format('d-m-Y')->nullable();
            $table->string('alamat')->nullable();
            $table->mediumText('kota_asal')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('no_hp_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('no_hp_ibu')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();


        });
        DB::update("ALTER TABLE users AUTO_INCREMENT = 210100;");
    }

   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
