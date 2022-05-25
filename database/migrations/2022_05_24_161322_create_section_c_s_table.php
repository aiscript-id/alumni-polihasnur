<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_c', function (Blueprint $table) {
            $table->id();
            // tracer_user_id
            $table->foreignId('tracer_user_id')->on('tracer_users');

            // content
            $table->string('c1')->nullable();
            $table->string('c2')->nullable();
            $table->string('c3')->nullable();
            $table->string('c41')->nullable();
            $table->string('c42')->nullable();
            $table->string('c5')->nullable();
            $table->string('c6')->nullable();
            $table->string('c7')->nullable();
            $table->string('c8')->nullable();
            $table->string('c9')->nullable();
            $table->string('c10')->nullable();
            $table->string('cx1')->nullable();
            $table->string('cx2')->nullable();
            $table->string('cx3')->nullable();
            $table->string('cx4')->nullable();
            $table->string('cx5')->nullable();
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
        Schema::dropIfExists('section_c');
    }
}
