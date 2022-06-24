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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->char('nik',16)->unique();
            $table->string('nama',50);
            $table->char('jenis_kelamin',1);
            $table->string('provinsi',20);
            $table->string('kota',20);
            $table->text('alamat_lengkap');
            $table->string('email',50)->unique();
            $table->string('telp',12);
            $table->string('pekerjaan',50);
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
};
