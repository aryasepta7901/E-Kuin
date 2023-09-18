<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3277Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Cimahi
        Satker::insert([
            [
                'id' => '3277',
                'nama_satker' => 'Kota Cimahi',
                'alamat' => 'Jl. Encep Kartawiria No.20B, Citeureup, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40512',
                'no_telp' => '(0664) 5985',
                'fax' => '(0664) 5985',
                'web' => 'http://cimahikota.bps.go.id',
                'email' => 'bps3277@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196706291994032001',
                'name' => 'Ir. Sitti Sarah',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3277'
            ],
            [
                'id' => '198703282009121001',
                'name' => 'Bimo Nugroho',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3277'

            ],
            [
                'id' => '3277',
                'name' => 'Admin 3277',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3277'
            ],
            // [
            //     'id' => '197504242002122002',
            //     'name' => 'Retno Dwiastuti, S.Si',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3277'
            // ],
            // [
            //     'id' => '199411152017012001',
            //     'name' => 'Chintya Ovelia Arifin, SST',
            //     'role' => 'PBJ',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3277'
            // ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '198703282009121001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3277/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
