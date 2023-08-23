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
        Schema::create('user_ppk', function (Blueprint $table) {
            $table->id();
            $table->string('program')->nullable();
            $table->string('no_surat_tugas')->nullable();
            $table->date('tanggal_surat_tugas')->nullable();
            $table->char('user_id', 18);
            // $table->boolean('status')->default(0);
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('user_ppk');
    }
};
