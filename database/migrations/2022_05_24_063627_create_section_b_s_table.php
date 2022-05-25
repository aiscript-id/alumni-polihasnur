<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_b', function (Blueprint $table) {
            $table->id();
            // tracer_user_id
            $table->foreignId('tracer_user_id')->on('tracer_users');

            // content
            $table->string('b11')->nullable();
            $table->string('b12')->nullable();
            $table->string('b2')->nullable();
            $table->string('b31')->nullable();
            $table->string('b32')->nullable();
            $table->string('b4')->nullable();
            $table->string('b51')->nullable();
            $table->string('b52')->nullable();
            $table->string('b53')->nullable();
            $table->string('b54')->nullable();
            $table->string('b55')->nullable();
            $table->string('b6')->nullable();
            $table->string('b7')->nullable();
            $table->string('b8')->nullable();
            $table->string('b9')->nullable();
            $table->string('b10')->nullable();
            $table->string('bx1')->nullable();
            $table->string('bx2')->nullable();
            $table->string('bx3')->nullable();
            $table->string('bx4')->nullable();
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
        Schema::dropIfExists('section_b');
    }
}
