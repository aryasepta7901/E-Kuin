<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3208Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Kuningan
        Satker::insert([
            [
                'id' => '3208',
                'nama_satker' => 'Kabupaten Kuningan',
                'alamat' => 'Jl. RE. Martadinata No.66, Cijoho, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45513',
                'no_telp' => '(+62) 232 871662',
                'fax' => '(+62) 232 871662',
                'web' => 'http://kuningankab.bps.go.id',
                'email' => 'bps3208@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197601101997122001',
                'name' => 'Irna Afrianti S.,Si',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3208'
            ],
            [
                'id' => '196908251991031004',
                'name' => 'Zezen Zaenudin, SST., MM.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3208'

            ],
            [
                'id' => '3208',
                'name' => 'Admin 3208',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3208'
            ],
            [
                'id' => '198512112011012016',
                'name' => 'Ikeu Pujawanti',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3208'
            ],
            [
                'id' => '196802061990031003',
                'name' => 'Pepen Supena',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3208'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '196908251991031004',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3208/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
