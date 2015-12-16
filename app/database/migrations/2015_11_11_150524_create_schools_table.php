<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenjang');
            $table->string('name');
            $table->string('adstreet');
            $table->string('advillage');
            $table->string('addistricts');
            $table->string('adcity');
            $table->string('adpostalcode');
            $table->string('adphone');
            $table->string('hmname');
            $table->string('hmphone');
            $table->string('hmmobile');
            $table->integer('user_id')->unsigned();
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
        Schema::drop('schools');
    }

}
