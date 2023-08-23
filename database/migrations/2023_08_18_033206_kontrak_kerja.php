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
        Schema::create('kontrak_kerja', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->text('pekerjaan');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->string('kode_mak')->nullable();
            $table->string('formulir_permintaan')->nullable();
            $table->string('no_tunjuk')->nullable();
            $table->integer('jenis_id')->nullable();
            $table->integer('denda_id')->nullable();
            $table->string('pagu_anggaran')->nullable();
            $table->string('tanggal_dipa')->nullable();

            $table->integer('id_vendor');
            $table->char('pbj', 18)->nullable();
            $table->char('ppk', 18)->nullable();

            $table->double('total_penawaran', 8)->nullable();
            $table->double('total_negosiasi', 8)->nullable();
            $table->double('total_selisih', 8)->nullable();
            $table->boolean('status')->default(0);



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
        Schema::dropIfExists('kontrak_kerja');
    }
};
