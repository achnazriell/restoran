<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pelanggan', function (Blueprint $table) {
        $table->id('id_pelanggan'); // Ini akan membuat kolom 'id' sebagai primary key
        $table->string('nama_pelanggan');
        $table->string('telepon_pelanggan');
        $table->date('tanggal_pesan');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
