<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PositionsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('positions')->delete();

		$positions = [
			['id'		=>	1, 
			'name'		=>	'Pembimbing',
			'created_at'=>	'2015-11-07 21:00:00',
			'updated_at'=>	'2015-11-07 21:00:00'],

			['id'		=>	2, 
			'name'		=>	'Ketua Pelaksana',
			'created_at'=>	'2015-11-07 21:00:00',
			'updated_at'=>	'2015-11-07 21:00:00'],
		];

		//insert data ke database
		DB::table('positions')->insert($positions);
	}

}