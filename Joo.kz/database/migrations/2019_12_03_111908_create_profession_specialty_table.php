<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionSpecialtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession_specialty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profession_id')->unsigned();
            $table->bigInteger('specialty_id')->unsigned();
            $table->timestamps();


            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade');

            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession_specialty');
    }
}
