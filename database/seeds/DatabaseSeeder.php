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
        // $this->call(UsersTableSeeder::class);

        App\User::create(
            [
                'name' => 'aurelien',
                'email' => 'aurelienbrtmail@gmail.com',
                'password' => bcrypt('aurelien'),
                'isAdmin' => true,
            ]
        );
    }
}
