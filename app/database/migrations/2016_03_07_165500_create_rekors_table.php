<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRekorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rekors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tingkat');
			$table->string('nolomba');
			$table->string('nama');
			$table->string('pendidikan');
			$table->string('prestasi');
			$table->string('tahun');
			$table->string('urut');
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
		Schema::drop('rekors');
	}

}
