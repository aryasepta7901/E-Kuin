<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3212Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Indramayu
        Satker::insert([
            [
                'id' => '3212',
                'nama_satker' => 'Kabupaten Indramayu',
                'alamat' => 'Jl. Golf No. 4 Karanganyar Kabupaten Indramayu',
                'no_telp' => '(0234) 272880',
                'fax' => '(0234) 272880',
                'web' => 'http://indramayukab.bps.go.id',
                'email' => 'bps3212@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196605131988021001',
                'name' => 'Ono Margiono, S.Si, M.M',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3212'
            ],
            [
                'id' => '197309061999031002',
                'name' => 'Yudi Muhammad Nur Rakhmatillah, S.IP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3212'

            ],
            [
                'id' => '3212',
                'name' => 'Admin 3212',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3212'
            ],
            [
                'id' => '198604122010031001',
                'name' => 'Wahyudi Guntara',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3212'
            ],
            [
                'id' => '197705141999011001',
                'name' => 'Sana Damarhita, S.Si, M.E',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3212'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '197309061999031002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3212/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
