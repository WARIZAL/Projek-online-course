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
        Schema::create('class', function (Blueprint $table) {
            $table->id('id_class');
            $table->foreignId('id_member');
            $table->foreignId('id_bidang');
            $table->enum('jenis_class', ['free', 'premium', 'bootcamp']);
            $table->double('harga_class');
            $table->integer('lama_course');
            $table->date('tgl_bayar');
            $table->date('tanggal_berakhir');
            $table->timestamps();
            $table->foreign('id_member')->references('id_member')->on('member')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class');
    }
};
