<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pesanan_detail')) {
            Schema::create('pesanan_detail', function (Blueprint $table) {
                $table->bigIncrements('id_detail');
                $table->unsignedBigInteger('id_pesan'); // Gunakan tipe data yang sesuai dengan primary key di tabel 'pesan'
                $table->foreign('id_pesan')->references('id_pesan')->on('pesan')->onDelete('cascade');
                // Tambahkan kolom lainnya sesuai kebutuhan
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan_detail', function (Blueprint $table) {
            $table->dropForeign(['id_pesan']);
        });

        Schema::dropIfExists('pesanan_detail');
    }
}
