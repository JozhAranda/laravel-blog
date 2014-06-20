<?php

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Post::truncate();

		foreach(range(1, 100) as $index)
		{
			$user_id = rand(3, 12);

			Post::create(array(
				'title'   => $faker->sentence,
				'content' => $faker->text,
				'user_id' => $user_id
			));
		}
	}

}