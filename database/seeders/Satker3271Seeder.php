<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3271Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Bogor
        Satker::insert([
            [
                'id' => '3271',
                'nama_satker' => 'Kota Bogor',
                'alamat' => ' Jl. Layungsari III No.13, RT.04/RW.18, Empang, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16132',
                'no_telp' => '(0251) 8324579',
                'fax' => '(0251) 8327641',
                'web' => 'http://bogorkota.bps.go.id',
                'email' => 'bps3271@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197002211992111001',
                'name' => 'Dr. Daryanto',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3271'
            ],
            [
                'id' => '197008211993121001',
                'name' => 'Agus Berlian Nur',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3271'

            ],
            [
                'id' => '3271',
                'name' => 'Admin 3271',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3271'
            ],
            // [
            //     'id' => '197803272006041001',
            //     'name' => 'Yudi Samudra, S.E.',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3271'
            // ],
            [
                'id' => '196905071993121001',
                'name' => 'Imam Wahyudi',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3271'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197008211993121001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3271/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
