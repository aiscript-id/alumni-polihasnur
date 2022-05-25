<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_a', function (Blueprint $table) {
            $table->id();
            // tracer_user_id
            $table->foreignId('tracer_user_id')->on('tracer_users');

            // content
            $table->string('a31')->nullable();
            $table->string('a32')->nullable();
            $table->string('a33')->nullable();
            $table->string('a34')->nullable();

            $table->text('a51')->nullable();
            $table->string('a52')->nullable();
            $table->string('a53')->nullable();

            $table->TEXT('a61')->nullable();
            $table->string('a62')->nullable();
            $table->string('a63')->nullable();
            $table->string('a64')->nullable();
            $table->string('a65')->nullable();
            $table->string('a66')->nullable();
            $table->string('a67')->nullable();
            $table->string('a68')->nullable();

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
        Schema::dropIfExists('section_a');
    }
}
