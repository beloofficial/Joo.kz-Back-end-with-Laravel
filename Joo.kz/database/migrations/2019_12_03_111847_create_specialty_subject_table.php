<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtySubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty_subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('specialty_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->timestamps();



            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty_subject');
    }
}
