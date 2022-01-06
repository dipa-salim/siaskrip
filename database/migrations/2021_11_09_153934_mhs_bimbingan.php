<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MhsBimbingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mhs_bimbingan', function (Blueprint $table) {
            $table->id('id_mhs_bimbingan');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_judul_sebelumnya')->nullable();
            $table->unsignedBigInteger('id_surat_tugas')->nullable();
            $table->unsignedBigInteger('id_sempro')->nullable();
            $table->unsignedBigInteger('id_skripsi')->nullable();
            $table->string('status_dospem')->nullable();
            $table->string('status_surat_tugas')->nullable();
            $table->string('status_sempro')->nullable();
            $table->string('status_surat_skripsi')->nullable();
            $table->string('status_skripsi')->nullable();
            $table->string('status_hasil_skripsi')->nullable();
            $table->string('url_bab1')->nullable();
            $table->string('judul_skripsi')->nullable();
            $table->string('url_surat_dosen')->nullable();
            $table->string('url_surat_dosen_ttd')->nullable();
            $table->string('url_lembar_sempro')->nullable();
            $table->string('url_logbook_sempro')->nullable();
            $table->string('url_proposal')->nullable();
            $table->string('url_lembar_sempro_ttd')->nullable();
            $table->string('url_logbook_sempro_ttd')->nullable();
            $table->string('url_lembar_skripsi')->nullable();
            $table->string('url_logbook_skripsi')->nullable();
            $table->string('url_skripsi')->nullable();
            $table->string('url_lembar_skripsi_ttd')->nullable();
            $table->string('url_logbook_skripsi_ttd')->nullable();
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
        Schema::dropIfExists('tb_mhs_bimbingan');
    }
}
