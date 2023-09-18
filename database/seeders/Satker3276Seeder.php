<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3276Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Depok
        Satker::insert([
            [
                'id' => '3276',
                'nama_satker' => 'Kota Depok',
                'alamat' => 'Komplek Perkantoran GDC Jl Raya Boulevard Sektor Anggrek Cilodong Kota Depok',
                'no_telp' => '(021) 7710370',
                'fax' => '(021) 77825913',
                'web' => 'http://depokkota.bps.go.id',
                'email' => 'bps3276@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197209261999031001',
                'name' => 'Erwin Subarkah, S.Kom',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3276'
            ],
            [
                'id' => '197303201997032002',
                'name' => 'Rr. Sri Handayani K, SST',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3276'

            ],
            [
                'id' => '3276',
                'name' => 'Admin 3276',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3276'
            ],
            [
                'id' => '197504242002122002',
                'name' => 'Retno Dwiastuti, S.Si',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3276'
            ],
            [
                'id' => '199411152017012001',
                'name' => 'Chintya Ovelia Arifin, SST',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3276'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197303201997032002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3276/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
