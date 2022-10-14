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
            'email' => 'admin@smkn10jakarta.sch.id',
            'password' => bcrypt('admin10;'),
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
