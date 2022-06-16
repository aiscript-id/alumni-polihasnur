<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
        
            // user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('name');
            $table->string('position');
            $table->string('city');
            $table->string('address');

            $table->string('status');

            // start date
            $table->date('start_date');

            // end date
            $table->date('end_date')->nullable();

            $table->text('requirement')->nullable();
            $table->text('description')->nullable();

            $table->text('map_link')->nullable();
            // logitude
            $table->string('longitude')->nullable();
            // latitude
            $table->string('latitude')->nullable();
            $table->integer('sesuai_prodi')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
