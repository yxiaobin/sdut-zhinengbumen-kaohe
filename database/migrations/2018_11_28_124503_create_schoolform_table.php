<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolform', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term_id'); //对应的学期
            $table->string('member_id'); //对应的人员
            $table->string('school_id'); //对应的学院
            $table->string('p1')->default(0); //
            $table->string('p2')->default(0); //
            $table->string('p3')->default(0); //
            $table->string('p4')->default(0); //
            $table->string('p5')->default(0); //
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
        Schema::dropIfExists('schoolform');
    }
}
