<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('hari');
			$table->date('tgl');
			$table->string('tempat');
			$table->string('kegiatan');
			$table->string('hasil');
			$table->integer('user_id');
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
		Schema::drop('logs');
	}

}
