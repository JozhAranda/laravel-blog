<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		User::truncate();

		// Fake admin

		User::create(array(
			'email'      => 'admin@blog.com',
			'password'   => Hash::make('123456'),
			'first_name' => 'Luis',
			'last_name'  => 'Lopez',
			'role'       => 'admin'
		));

		// Real member

		User::create(array(
			'email'      => 'angel.lopez@morzan.com',
			'password'   => Hash::make('123456'),
			'first_name' => 'Luis',
			'last_name'  => 'Lopez',
			'role'       => 'member'
		));

		// Fake members

		foreach(range(1, 10) as $index)
		{
			User::create(array(
				'email'      => $faker->email,
				'password'   => Hash::make('123456'),
				'first_name' => $faker->firstName,
				'last_name'  => $faker->lastName,
				'role'       => 'member'
			));
		}
	}

}