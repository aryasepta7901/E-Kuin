<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3275Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Bekasi
        Satker::insert([
            [
                'id' => '3275',
                'nama_satker' => 'Kota Bekasi',
                'alamat' => 'Jl. Rawa Tembaga 1 No.6, RT.006/RW.005, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17141',
                'no_telp' => '(021) 88953987',
                'fax' => '(021) 88953987',
                'web' => 'http://bekasikota.bps.go.id',
                'email' => 'bps3275@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197101011992111001',
                'name' => 'Ari Setiadi Gunawan',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3275'
            ],
            [
                'id' => '199002102012111001',
                'name' => 'Widi Handoko',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3275'

            ],
            [
                'id' => '3275',
                'name' => 'Admin 3275',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3275'
            ],
            // [
            //     'id' => '197707092006041003',
            //     'name' => 'Muhidin, SH',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3275'
            // ],
            // [
            //     'id' => '198809062010121006',
            //     'name' => 'Muhammad Jaka, S.ST.',
            //     'role' => 'PBJ',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3275'
            // ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '199002102012111001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3275/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
