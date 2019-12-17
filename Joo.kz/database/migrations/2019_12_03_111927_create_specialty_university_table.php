<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty_university', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('specialty_id')->unsigned();
            $table->bigInteger('university_id')->unsigned();
            $table->timestamps();


            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');

            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty_university');
    }
}
