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
        Schema::create('pengetahuan2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyakit_id');
            $table->integer('G001');
            $table->integer('G002');
            $table->integer('G003');
            $table->integer('G004');
            $table->integer('G005');
            $table->integer('G006');
            $table->integer('G007');
            $table->integer('G008');
            $table->integer('G009');
            $table->integer('G010');
            $table->integer('G011');
            $table->integer('G012');
            $table->integer('G013');
            $table->integer('G014');
            $table->integer('G015');
            $table->integer('G016');
            $table->integer('G017');
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
        Schema::dropIfExists('pengetahuan2');
    }
};
