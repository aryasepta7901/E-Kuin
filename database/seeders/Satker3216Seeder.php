<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3216Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Bekasi
        Satker::insert([
            [
                'id' => '3216',
                'nama_satker' => 'Kabupaten Bekasi',
                'alamat' => 'Komplek Perkantoran Pemda Kabupaten Bekasi, Kota Deltamas, Sukamahi, Cikarang Pusat, Kec. Cikarang Pusat, Kabupaten Bekasi, Jawa Barat 17530',
                'no_telp' => '(021) 89970329',
                'fax' => '(021) 89970329',
                'web' => 'http://bekasikab.bps.go.id',
                'email' => 'bps3216@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197211301992031001',
                'name' => 'Nevi Hendri',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3216'
            ],
            [
                'id' => '197610121999011001',
                'name' => 'Eko Sucahyono',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3216'

            ],
            [
                'id' => '3216',
                'name' => 'Admin 3216',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3216'
            ],
            [
                'id' => '198008112014061002',
                'name' => 'Bastian Komara',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3216'
            ],
            [
                'id' => '198706232011011013',
                'name' => 'Pandu Permana',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3216'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197610121999011001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3216/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
