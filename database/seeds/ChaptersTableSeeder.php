<?php

use Illuminate\Database\Seeder;
use Foobooks\Chapter;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$faker = Faker\Factory::create();
    	for ($i=0; $i<1000; $i++){
		    Chapter::create([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => $faker->realText($maxNbChars = 25, $indexSize = 2),
		    'book_id' => $faker->numberBetween(1,100),
		    'content' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
		    'order' => $faker->numberBetween(1,100),
		    ]);
		}
	}
}
