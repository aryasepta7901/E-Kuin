<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3274Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Cirebon
        Satker::insert([
            [
                'id' => '3274',
                'nama_satker' => 'Kota Cirebon',
                'alamat' => 'Jl. Sekar Kemuning I, Evakuasi-Cirebon',
                'no_telp' => '(0231) 485524',
                'fax' => '(0231) 484403',
                'web' => 'http://cirebonkota.bps.go.id',
                'email' => 'bps3274@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197403071995121001',
                'name' => 'Aris Budiyanto, S.ST., M.Si.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3274'
            ],
            [
                'id' => '197005231992031002',
                'name' => 'Ujang Mauludin, S.ST., M.Si.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3274'

            ],
            [
                'id' => '3274',
                'name' => 'Admin 3274',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3274'
            ],
            // [
            //     'id' => '197707092006041003',
            //     'name' => 'Muhidin, SH',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3274'
            // ],
            [
                'id' => '198809062010121006',
                'name' => 'Muhammad Jaka, S.ST.',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3274'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197005231992031002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3274/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
