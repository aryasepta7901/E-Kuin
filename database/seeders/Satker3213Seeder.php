<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3213Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Subang
        Satker::insert([
            [
                'id' => '3213',
                'nama_satker' => 'Kabupaten Subang',
                'alamat' => 'Jl. Aipda KS Tubun No. 12 Subang',
                'no_telp' => '(0260) 411 101',
                'fax' => '(0260) 411 101',
                'web' => 'http://subangkab.bps.go.id',
                'email' => 'bps3213@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196811271994021001',
                'name' => 'Muhammad Sholihin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3213'
            ],
            [
                'id' => '197901302006042003',
                'name' => 'Santhi Susana Dewi',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3213'

            ],
            [
                'id' => '3213',
                'name' => 'Admin 3213',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3213'
            ],
            [
                'id' => '198803252011011013',
                'name' => 'Vendy Syaiful Ahmad',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3213'
            ],
            [
                'id' => '196806071987031001',
                'name' => 'Budi Rahayu',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3213'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '197901302006042003',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3213/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
