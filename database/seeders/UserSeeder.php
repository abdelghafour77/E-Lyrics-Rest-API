<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users using factory
        for ($i = 0; $i < 10; $i++) {
            $user = User::factory()->create();
            $user->assignRole('user');
        }
    }
}
