<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UserTableSeeder::class);

        factory('App\User')->create(
                [ 'name' => 'helder',
                    'email' => 'helder@email.com',
                    'password' => bcrypt(123),
                    'remember_token' => str_random(10)
                ]
        );

        $this->call(PostTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }

}
