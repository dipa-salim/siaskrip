<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sempro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sempro', function (Blueprint $table) {
            $table->id('id_sempro');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_surat_sebelumnya')->nullable();
            $table->string('judul_skripsi')->nullable();
            $table->string('url_lembar_dosen')->nullable();
            $table->string('url_skripsi')->nullable();
            $table->string('url_jadwal')->nullable();
            $table->string('url_revisi')->nullable();
            $table->string('url_surat_skripsi')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status');
            $table->string('dosen_pembimbing1')->nullable();
            $table->string('dosen_pembimbing2')->nullable();
            $table->string('dosen_penguji1')->nullable();
            $table->string('dosen_penguji2')->nullable();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
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
        Schema::dropIfExists('tb_sempro');
    }
}
