<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3206Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Tasikmalaya
        Satker::insert([
            [
                'id' => '3206',
                'nama_satker' => 'Kabupaten Tasikmalaya',
                'alamat' => 'Jl. Raya Timur Singaparna KM.4 Cintaraja Singaparna Tasikmalaya',
                'no_telp' => '(0265) 549281 ',
                'fax' => '(0265) 549254',
                'web' => 'http://tasikmalayakab.bps.go.id',
                'email' => 'bps3206@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196901191991121001',
                'name' => 'Januarto Wibowo',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3206'
            ],
            [
                'id' => '196906131989021001',
                'name' => 'Dindin Muldiana',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3206'

            ],
            [
                'id' => '3206',
                'name' => 'Admin 3206',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3206'
            ],
            // [
            //     'id' => '197102281991021001',
            //     'name' => 'Ali Nurdin, SE',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3206'
            // ],
            [
                'id' => '197410101993031001',
                'name' => 'Deni Iskandar',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3206'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '196906131989021001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3206/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
