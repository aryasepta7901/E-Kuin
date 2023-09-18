<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3205Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Bogor
        Satker::insert([
            [
                'id' => '3205',
                'nama_satker' => 'Kabupaten Garut',
                'alamat' => 'Jl. Pembangunan No 222 Tarogong Kidul Garut',
                'no_telp' => '(0262) 233273',
                'fax' => '(0262) 4893051',
                'web' => 'http://garutkab.bps.go.id',
                'email' => 'bps3205@bps.go.id',
            ],
        ]);
        User::insert([
            // BPS Kabupaten Garut
            [
                'id' => '196601281994031002',
                'name' => 'Dody Gunawan Yusuf',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3205'
            ],
            [
                'id' => '197610022002122004',
                'name' => 'Rita Salamah',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3205'

            ],
            [
                'id' => '3205',
                'name' => 'Admin 3205',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3205'
            ],
            [
                'id' => '197102281991021001',
                'name' => 'Ali Nurdin, SE',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3205'
            ],
            [
                'id' => '199208292014121001',
                'name' => 'Nurdiennanto Faroeq H.',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3205'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '197610022002122004',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3205/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
