<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerFunctionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_functionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('functional_id');
            $table->date('start_date_at');
            $table->string('decree_file')->nullable();
            $table->timestamps();

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('functional_id')->references('id')->on('functional_references');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_functionals');
    }
}
