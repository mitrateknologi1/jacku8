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
        Schema::create('pengabdian', function (Blueprint $table) {
            $table->id();
            $table->longText('nama');
            $table->string('ketua');
            $table->text('anggota');
            $table->string('tahun')->nullable();
            $table->string('besar_dana');
            $table->bigInteger('skema_pengabdian_id');
            $table->bigInteger('sumber_dana_id');
            $table->string('jenis_dokumen');
            $table->longText('file_proposal');
            $table->longText('file_laporan');
            $table->longText('file_luaran');
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
        Schema::dropIfExists('pengabdian');
    }
};
