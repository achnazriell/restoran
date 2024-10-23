<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('minuman')) {
            Schema::create('minuman', function (Blueprint $table) {
                $table->id('id_minuman');
                $table->string('nama_minuman');
                $table->decimal('harga_minuman');
                $table->string('foto_minuman');
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
        Schema::dropIfExists('minuman');
    }
}
