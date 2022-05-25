<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_e', function (Blueprint $table) {
            $table->id();
            // tracer_user_id
            $table->foreignId('tracer_user_id')->on('tracer_users');

            // content
            $table->string('e1')->nullable();
            $table->string('e2')->nullable();
            $table->string('e3')->nullable();
            $table->string('e4')->nullable();
            $table->string('e5')->nullable();
            $table->string('e6')->nullable();
            $table->string('e7')->nullable();
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
        Schema::dropIfExists('section_e');
    }
}
