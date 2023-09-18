<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3278Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Tasikmalaya
        Satker::insert([
            [
                'id' => '3278',
                'nama_satker' => 'Kota Tasikmalaya',
                'alamat' => 'Jl. Sukarindik No 71 Tasikmalaya',
                'no_telp' => '(0265) 346022',
                'fax' => '(0265) 346031',
                'web' => 'http://tasikmalayakota.bps.go.id',
                'email' => 'bps3278@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '19790917200121003',
                'name' => 'Bambang Pamungkas',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3278'
            ],
            [
                'id' => '197306071994031002',
                'name' => 'Munir S.ST',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3278'

            ],
            [
                'id' => '3278',
                'name' => 'Admin 3278',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3278'
            ],
            // [
            //     'id' => '197504242002122002',
            //     'name' => 'Retno Dwiastuti, S.Si',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3278'
            // ],
            [
                'id' => '199005142013112001',
                'name' => 'Etik Isnaeni',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3278'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197306071994031002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3278/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
