<?php

use Illuminate\Database\Seeder;
use Foobooks\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $faker = Faker\Factory::create();

       DB::table('users')->insert([
        'name'      => 'testa',
        'email'      => 'testa@test.com',
        'password'   => Hash::make('testa'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ]);

        DB::table('users')->insert([
        'name'      => 'test',
        'email'      => 'test@test.com',
        'password'   => Hash::make('test'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ]);

        for ($i = 0; $i<20;$i++){
            User::create([
                'name'  => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make(123456),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                ]);
        }
    }
}