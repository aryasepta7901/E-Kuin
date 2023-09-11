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
        Schema::create('Barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('spesifikasi');
            $table->string('satuan', 10);
            $table->double('volume', 4);
            $table->double('harga_hps', 8);
            $table->double('total_harga_hps', 8);
            $table->double('harga_tawar', 8);
            $table->double('total_harga_tawar', 8);
            $table->double('harga_nego', 8);
            $table->double('total_harga_nego', 8);
            $table->double('selisih_nego', 8);
            $table->char('kontrak_id', 36);

            $table->foreign('kontrak_id')->references('id')->on('kontrak_kerja')->onDelete('cascade');



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
        Schema::dropIfExists('Barang');
    }
};
