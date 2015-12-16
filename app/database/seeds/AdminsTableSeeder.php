<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('admins')->delete();

		$admins = [
			['id'		=>	1, 
			'noi'		=>	'105623031',
			'name'		=>	'Aan Choesni Herlingga',
			'jabatan'	=>	'Admin',
			'tahun'		=>	'2016',
			'user_id'	=>	'1',
			'created_at'=>	'2015-11-03 13:44:00',
			'updated_at'=>	'2015-11-03 13:44:00'],

			['id'		=>	2, 
			'noi'		=>	'105514014',
			'name'		=>	'Nofida Suwita Sari',
			'jabatan'	=>	'Panitia',
			'tahun'		=>	'2016',
			'user_id'	=>	'2',
			'created_at'=>	'2015-11-03 13:44:00',
			'updated_at'=>	'2015-11-03 13:44:00'],
		];

		//insert data ke database
		DB::table('admins')->insert($admins);
	}

}