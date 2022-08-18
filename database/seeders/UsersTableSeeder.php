<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Constantino',
            'email' => 'costa@gmail.com',
            'password' => bcrypt('euler1998'),
            'counter' => 1
        ]);
    }
}
