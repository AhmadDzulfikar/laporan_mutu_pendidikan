<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@wildan',
            'password' => bcrypt('password'),
            'gambar' => null

        ]);

        // $owner->assignRole('owner');

        $guru = User::create([
            'name' => 'Guru',
            'email' => 'guru@wildan',
            'password' => bcrypt('password'),
            'gambar' => null
        ]);

        // $manager->assignRole('manager');
    }
}
