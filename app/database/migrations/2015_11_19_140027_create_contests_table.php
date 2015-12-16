<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nocontest');
            $table->string('verifikasi');
            $table->string('name');
            $table->string('nis');
            $table->string('tmptlhr');
            $table->string('tgllhr');
            $table->string('tahun');
            $table->string('nodada');
            $table->string('juara');
            $table->string('jenjang');
            $table->string('foto');
            $table->string('rapor');
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
        Schema::drop('contests');
    }

}
