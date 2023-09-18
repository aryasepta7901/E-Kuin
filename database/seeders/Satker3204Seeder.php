<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3204Seeder extends Seeder
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
                'id' => '3204',
                'nama_satker' => 'Kabupaten Bandung',
                'alamat' => 'Jl. Raya Soreang KM.17 (Komplek PemKab Bandung) Kab Bandung',
                'no_telp' => '(022) 5895905',
                'fax' => '(022) 5880882',
                'web' => 'http://bandungkab.bps.go.id',
                'email' => 'bps3204@bps.go.id',
            ],
        ]);
        User::insert([
            // BPS Kabupaten Cianjur
            [
                'id' => '197509091994031001',
                'name' => 'Agung Hartadi',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3204'
            ],
            [
                'id' => '197503052998031003',
                'name' => 'Deni Riyadi',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3204'

            ],
            [
                'id' => '3204',
                'name' => 'Admin 3204',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3204'
            ],
            [
                'id' => '198310112008011008',
                'name' => 'Boyke',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3204'
            ],
            [
                'id' => '198807082014101001',
                'name' => 'Alex Firmansyah',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3204'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '197503052998031003',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3204/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
