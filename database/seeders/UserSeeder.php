<?php

namespace Database\Seeders;

use App\Models\Masuk;
use App\Models\PesertaDidik;
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

        $pd = PesertaDidik::create([
            'siswa' => 'siswa1',
            'nisn' => 2000,
            'tempat' => 'jkt',
            'tgl_lahir' => '2022-09-09',
            'no_tlp' => 123,
            'org_tua' => 'delep',
            'tgl_msk' => '2022-09-09',
            'tgl_lulus' => '2022-09-09'
        ]);

        $masuk = Masuk::create([
            'pesertadidik_id' => $pd->id
            
        ]);

        // $manager->assignRole('manager');
    }
}
