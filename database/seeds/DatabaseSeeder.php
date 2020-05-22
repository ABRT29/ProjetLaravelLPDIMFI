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
                'name' => 'Aurélien',
                'email' => 'aurelienbrtmail@mail.com',
                'password' => bcrypt('aurelien'),
                'isAdmin' => false,
            ]
        );

        App\User::create(
            [
                'name' => 'Administrateur',
                'email' => 'admin@mail.com',
                'password' => bcrypt('adm1n1strat3ur'),
                'isAdmin' => true,
            ]
        );

    }
}
