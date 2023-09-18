<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3207Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Ciamis
        Satker::insert([
            [
                'id' => '3207',
                'nama_satker' => 'Kabupaten Ciamis',
                'alamat' => 'Jl. RAA Kusumahsubrata Kertasari Ciamis',
                'no_telp' => '(0265) 771321',
                'fax' => '(0265) 771322',
                'web' => 'http://ciamiskab.bps.go.id',
                'email' => 'bps3207@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197301161994121001',
                'name' => 'Dadang Darmansyah',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3207'
            ],
            [
                'id' => '19840302007012003',
                'name' => 'Nur Azizah Muyassaroh',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3207'

            ],
            [
                'id' => '3207',
                'name' => 'Admin 3207',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3207'
            ],
            // [
            //     'id' => '197102281991021001',
            //     'name' => 'Ali Nurdin, SE',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3207'
            // ],
            [
                'id' => '197409241994031001',
                'name' => 'Yaya Suhaya',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3207'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '19840302007012003',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3207/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
