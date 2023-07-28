<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
 $table->unsignedInteger('Courseid')->index();
 $table->foreign('Courseid')->references('Courseid')->on('courses');

 $table->unsignedInteger('Studid')->index();
 $table->foreign('Studid')->references('Studid')->on('students');

            $table->string('DOJ');
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
        Schema::dropIfExists('registrations');
    }
}
