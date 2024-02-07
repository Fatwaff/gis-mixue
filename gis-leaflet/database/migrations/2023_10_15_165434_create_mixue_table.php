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
        Schema::create('mixue', function (Blueprint $table) {
            $table->id();
            $table->string('namacabang');
            $table->string('alamat');
            $table->string('jam_operasional');
            $table->string('no_telp');
            $table->string('fasilitas');
            $table->string('foto');
            $table->string('latitude');
            $table->string('longitude');          
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
        Schema::dropIfExists('mixue');
    }
};
