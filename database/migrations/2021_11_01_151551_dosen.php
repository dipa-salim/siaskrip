<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->unsignedBigInteger('id_user');
            $table->string('nama', 255);
            $table->string('nip', 20);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_hp', 15)->nullable();
            $table->boolean('status_dosen')->nullable();
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
        Schema::dropIfExists('tb_dosen');
    }
}
