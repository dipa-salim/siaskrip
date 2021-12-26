<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbSuratTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surat_tugas', function (Blueprint $table) {
            $table->id('id_surat_tugas');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_surat_sebelumnya')->nullable();
            $table->string('judul_skripsi');
            $table->string('url_bab1');
            $table->string('url_surat_dosen')->nullable();
            $table->string('url_surat_tugas')->nullable();
            $table->string('status');
            $table->string('dosen_pembimbing1')->nullable();
            $table->string('dosen_pembimbing2')->nullable();
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
        Schema::dropIfExists('tb_surat_tugas');
    }
}
