<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_f', function (Blueprint $table) {
            $table->id();
            // tracer_user_id
            $table->foreignId('tracer_user_id')->on('tracer_users');

            // content
            $table->string('f1')->nullable();
            $table->string('f2')->nullable();
            $table->string('f3a')->nullable();
            $table->string('f3b')->nullable();
            $table->string('f3c')->nullable();
            $table->string('f3d')->nullable();
            $table->string('f3e')->nullable();
            $table->string('f3f')->nullable();
            $table->string('f3g')->nullable();
            $table->string('f3h')->nullable();
            $table->string('f3i')->nullable();
            $table->string('f3j')->nullable();
            $table->string('f3k')->nullable();
            $table->string('f3l')->nullable();
            $table->string('f4a')->nullable();
            $table->string('f4b')->nullable();
            $table->string('f4c')->nullable();
            $table->string('f4d')->nullable();
            $table->string('f4e')->nullable();
            $table->string('f4f')->nullable();
            $table->string('f4g')->nullable();
            $table->string('f4h')->nullable();
            $table->string('f4i')->nullable();
            $table->string('f4j')->nullable();
            $table->string('f4k')->nullable();
            $table->string('f4l')->nullable();

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
        Schema::dropIfExists('section_f');
    }
}
