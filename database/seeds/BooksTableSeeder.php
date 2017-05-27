<?php

use Illuminate\Database\Seeder;
use Foobooks\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	
    	$faker = Faker\Factory::create();

	    $user_id = \Foobooks\User::where('name','=','test')->pluck('id')->first();
	    DB::table('books')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'title' => 'The Test',
	    'user_id' => $user_id,
	    'published' => true,
	    'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
	    'synopsis' => $faker->realText($maxNbChars = 250, $indexSize = 2),
	    'chapters' => 12,
	    ]);

	    $user_id = \Foobooks\User::where('name','=','testa')->pluck('id')->first();
	    DB::table('books')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'title' => 'The Tester',
	    'user_id' => $user_id,
	    'published' => false,
	    'cover' => 'http://img1.imagesbn.com/p/9780061148514_p0_v2_s114x166.JPG',
	    'synopsis' => $faker->realText($maxNbChars = 250, $indexSize = 2),
	    'page_count' => 1234,
	    ]);

	    for ($i = 0; $i<100;$i++){
           	Book::create([
	                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
				    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
				    'title' => $faker->realText($maxNbChars = 20, $indexSize = 2),
				    'user_id' => $faker->numberBetween($min = 1, $max = 22),
				    'published' => $faker->boolean($chanceOfGettingTrue = 30),
				    'cover' => $faker->imageUrl($width = 640, $height = 480),
				    'synopsis' => $faker->realText($maxNbChars = 250, $indexSize = 2),
				    'private' => false,
				    'chapters' => $faker->numberBetween($min = 0, $max = 200),
                ]);
        }
    }
}