<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skemas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('jenjang');
			$table->integer('tahun');
			$table->string('lomba');
			$table->string('seri');
			$table->string('nolint');
			$table->string('nodada');
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
		Schema::drop('skemas');
	}

}
