<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCpToSectionCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('section_c', function (Blueprint $table) {
            $table->string('cp1')->nullable();
            $table->string('cp2')->nullable();
            $table->string('cp3')->nullable();
            $table->string('cp41')->nullable();
            $table->string('cp42')->nullable();
            $table->string('cp5')->nullable();
            $table->string('cp6')->nullable();
            $table->string('cp7')->nullable();
            $table->string('cp8')->nullable();
            $table->string('cp9')->nullable();
            $table->string('cp10')->nullable();
            $table->string('cpx1')->nullable();
            $table->string('cpx2')->nullable();
            $table->string('cpx3')->nullable();
            $table->string('cpx4')->nullable();
            $table->string('cpx5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_c', function (Blueprint $table) {
            $table->dropColumn('cp1');
            $table->dropColumn('cp2');
            $table->dropColumn('cp3');
            $table->dropColumn('cp41');
            $table->dropColumn('cp42');
            $table->dropColumn('cp5');
            $table->dropColumn('cp6');
            $table->dropColumn('cp7');
            $table->dropColumn('cp8');
            $table->dropColumn('cp9');
            $table->dropColumn('cp10');
            $table->dropColumn('cpx1');
        });
    }
}
