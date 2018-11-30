<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchooltermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolterm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term_id'); //对应的学期
            $table->string('school_id'); //对应的学院
            $table->string('p1A')->default(0); //
            $table->string('p1B')->default(0); //
            $table->string('p1C')->default(0); //
            $table->string('p1D')->default(0); //

            $table->string('p2A')->default(0); //
            $table->string('p2B')->default(0); //
            $table->string('p2C')->default(0); //
            $table->string('p2D')->default(0); //

            $table->string('p3A')->default(0); //
            $table->string('p3B')->default(0); //
            $table->string('p3C')->default(0); //
            $table->string('p3D')->default(0); //

            $table->string('p4A')->default(0); //
            $table->string('p4B')->default(0); //
            $table->string('p4C')->default(0); //
            $table->string('p4D')->default(0); //

            $table->string('p5A')->default(0); //
            $table->string('p5B')->default(0); //
            $table->string('p5C')->default(0); //
            $table->string('p5D')->default(0); //

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
        Schema::dropIfExists('schoolterm');
    }
}
