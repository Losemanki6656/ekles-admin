<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::query()
            ->create([
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'name' => 'Admin'
            ]);
    }
}
