<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3211Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Sumedang
        Satker::insert([
            [
                'id' => '3211',
                'nama_satker' => 'Kabupaten Sumedang',
                'alamat' => 'Jl. Karapyak No. 61 Sumedang',
                'no_telp' => '(0261) 2202014',
                'fax' => '(0261) 2202015',
                'web' => 'http://sumedangkab.bps.go.id',
                'email' => 'bps3211@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197407011996121001',
                'name' => 'Dudi Barmana',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3211'
            ],
            [
                'id' => '198409252007011001',
                'name' => 'Hendy Hario Sasongko',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3211'

            ],
            [
                'id' => '3211',
                'name' => 'Admin 3211',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3211'
            ],
            [
                'id' => '198603082010032001',
                'name' => 'Nunik Handayani',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3211'
            ],
            [
                'id' => '197006081992031004',
                'name' => 'Mochamad Ilham',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3211'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '198409252007011001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3211/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
