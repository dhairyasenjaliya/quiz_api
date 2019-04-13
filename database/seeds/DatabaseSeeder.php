<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);

        DB::table('categories')->insert([ 
            'title'  => Str::random(10),
            'isDaily' => true,
        ]);

        // DB::table('questions')->insert([ 
        //     'categories'  => integer::random(10),
        //     'question'  => Str::random(10),
        //     'answer'  => false,
        // ]);
    }
}
