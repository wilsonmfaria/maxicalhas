<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Maxi Calhas',
            'email' => 'maxi@calhas',
            'password' => bcrypt('maxicalhas')
        ]);
        $user->assignRole('administrator');

    }
}
