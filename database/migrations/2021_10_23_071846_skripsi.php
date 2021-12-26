<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Skripsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_skripsi', function (Blueprint $table) {
            $table->id('id_skripsi');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_surat_sebelumnya')->nullable();
            $table->string('judul_skripsi')->nullable();
            $table->string('url_biodata')->nullable();
            $table->string('url_pkl')->nullable();
            $table->string('url_pkm')->nullable();
            $table->string('url_ktm')->nullable();
            $table->string('url_skripsi')->nullable();
            $table->string('url_jadwal')->nullable();
            $table->string('url_revisi')->nullable();
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
        Schema::dropIfExists('tb_skripsi');
    }
}
