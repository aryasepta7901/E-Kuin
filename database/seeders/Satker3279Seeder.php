<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3279Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Banjar
        Satker::insert([
            [
                'id' => '3279',
                'nama_satker' => 'Kota Banjar',
                'alamat' => 'Jl. Peta No. 128 Desa Balokang, Banjar',
                'no_telp' => '(0265) 744104',
                'fax' => '(0265) 744104',
                'web' => 'http://banjarkota.bps.go.id',
                'email' => 'bps3279@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196612021989011001',
                'name' => 'Taufik',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3279'
            ],
            [
                'id' => '197002231994031002',
                'name' => 'Dadang Herawan',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3279'

            ],
            [
                'id' => '3279',
                'name' => 'Admin 3279',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3279'
            ],
            // [
            //     'id' => '197504242002122002',
            //     'name' => 'Retno Dwiastuti, S.Si',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3279'
            // ],
            [
                'id' => '198407092007011003',
                'name' => 'Ahmad Taufiq Habibi',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3279'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197002231994031002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3279/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
