<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3203Seeder extends Seeder
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
                'id' => '3203',
                'nama_satker' => 'Kabupaten Cianjur',
                'alamat' => 'Jl. Perintis Kemerdekaan No.3 Cianjur',
                'no_telp' => '(0263) 264762',
                'fax' => '(0263) 264762',
                'web' => 'http://cianjurkab.bps.go.id',
                'email' => 'bps3203@bps.go.id',
            ],
        ]);
        User::insert([
            // BPS Kabupaten Cianjur
            [
                'id' => '196612281994031003',
                'name' => 'Hartono',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3203'
            ],
            [
                'id' => '196804071989031010',
                'name' => 'Eman Sulaeman',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3203'

            ],
            [
                'id' => '3203',
                'name' => 'Admin 3203',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3203'
            ],
            [
                'id' => '196606261994012001',
                'name' => 'Erna Sunarsih',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3203'
            ],
            [
                'id' => '197706202006041002',
                'name' => 'Yogi Hardiman',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3203'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '196804071989031010',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3203/PB',
                'tanggal_surat_tugas' => '2023-03-03',
            ],
        ]);
    }
}
