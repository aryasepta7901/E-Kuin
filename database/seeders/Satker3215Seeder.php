<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3215Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Karawang
        Satker::insert([
            [
                'id' => '3215',
                'nama_satker' => 'Kabupaten Karawang',
                'alamat' => 'Jl. Cakradireja No.36, Nagasari, Karawang',
                'no_telp' => '(0267) 402250',
                'fax' => '(0267) 8452148',
                'web' => 'http://karawangkab.bps.go.id',
                'email' => 'kabkarawang@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197104261992111001',
                'name' => 'Robert Ronytua Pardosi',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3215'
            ],
            [
                'id' => '196909301989031001',
                'name' => 'Asep Surya',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3215'

            ],
            [
                'id' => '3215',
                'name' => 'Admin 3215',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3215'
            ],
            // [
            //     'id' => '198709182009022005',
            //     'name' => 'Anneke Ayu Indreswari,SE',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3215'
            // ],
            // [
            //     'id' => '197704152006041004',
            //     'name' => 'Yusuf Priatna Candra Purnama,SP',
            //     'role' => 'PBJ',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3215'
            // ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '196909301989031001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3215/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
