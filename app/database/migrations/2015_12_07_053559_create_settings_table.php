<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('startdayreg');
            $table->date('enddayreg');
            $table->date('startdaypay');
            $table->date('enddaypay');
            $table->string('tmday');
            $table->date('tmdate');
            $table->string('tmtime');
            $table->string('tmplace');
            $table->string('contestday');
            $table->string('contestdate');
            $table->string('contesttime');
            $table->string('contestplace');
            $table->string('moneyreg');
            $table->string('moneyregest');
            $table->string('moneysertoff');
            $table->string('moneydocbook');
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
        Schema::drop('settings');
    }

}
