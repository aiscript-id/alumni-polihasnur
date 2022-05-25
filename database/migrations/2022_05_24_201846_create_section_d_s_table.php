<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_d', function (Blueprint $table) {
            $table->id();
            // tracer_user_id
            $table->foreignId('tracer_user_id')->on('tracer_users');

            // content
            $table->string('d11')->nullable();
            $table->string('d12')->nullable();
            $table->text('d2')->nullable();

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
        Schema::dropIfExists('section_d');
    }
}
