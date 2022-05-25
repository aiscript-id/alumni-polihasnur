<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracer_user', function (Blueprint $table) {
            $table->id();
            // user_id
            $table->foreignId('user_id')->constrained()->on('users')->onDelete('cascade');
            // tracer_id
            $table->foreignId('tracer_id')->constrained()->on('tracers')->onDelete('cascade');

            $table->integer('section_a')->default(0)->description('Data Pribadi');
            $table->integer('section_b')->default(0)->description('Riwayat Pendidikan');
            $table->integer('section_c')->default(0)->description('Riwayat Pekerjaan');
            $table->integer('section_d')->default(0)->description('Relevansi Pendidikan dengan Pekerjaan');
            $table->integer('section_e')->default(0)->description('Pengalaman Pembelajaran');
            $table->integer('section_f')->default(0)->description('Indikator Kompetensi');

            $table->string('bekerja')->nullable();

            $table->dateTime('submit_date')->nullable();
            $table->integer('complete')->default(0);
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
        Schema::dropIfExists('tracer_user');
    }
}
