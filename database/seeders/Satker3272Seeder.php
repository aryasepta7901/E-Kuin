<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3272Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Sukabumi
        Satker::insert([
            [
                'id' => '3272',
                'nama_satker' => 'Kota Sukabumi',
                'alamat' => 'Jl. Selabintana No.14, Cikole, Kec. Cikole, Kota Sukabumi, Jawa Barat 43113',
                'no_telp' => '(0266) 221926',
                'fax' => '(0226) 622908241',
                'web' => 'http://sukabumikota.bps.go.id',
                'email' => 'bps3272@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197102121994031005',
                'name' => 'Urip Sugeng Santoso',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3272'
            ],
            [
                'id' => '198208302003122003',
                'name' => 'Hani Setiani',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3272'

            ],
            [
                'id' => '3272',
                'name' => 'Admin 3272',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3272'
            ],
            [
                'id' => '197707092006041003',
                'name' => 'Muhidin, SH',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3272'
            ],
            [
                'id' => '196602091993012001',
                'name' => 'Ir. Syaferiza Yurnaili',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3272'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '198208302003122003',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3272/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
