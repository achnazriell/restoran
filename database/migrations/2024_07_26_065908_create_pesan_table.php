<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_makanan')->nullable(); // Sesuaikan dengan tipe data primary key di tabel 'makanan'
            $table->foreign('id_makanan')->references('id_makanan')->on('makanan')->onDelete('set null')->onUpdate('cascade');
            $table->integer('jumlah_makanan');
            $table->unsignedBigInteger('id_minuman')->nullable();
            $table->foreign('id_minuman')->references('id_minuman')->on('minuman')->onDelete('set null')->onUpdate('cascade');
            $table->integer('jumlah_minuman');
        });
    }

    public function down()
    {
        Schema::table('pesan', function (Blueprint $table) {
            $table->dropForeign(['id_pelanggan']);
            $table->dropForeign(['id_makanan']);
            $table->dropForeign(['id_minuman']);
        });

        Schema::dropIfExists('pesan');
    }
}
