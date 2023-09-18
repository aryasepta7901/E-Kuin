<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3273Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kota Bandung
        Satker::insert([
            [
                'id' => '3273',
                'nama_satker' => 'Kota Bandung',
                'alamat' => 'Jl. Jenderal Gatot Subroto No. 93 Bandung',
                'no_telp' => '(0266) 221926',
                'fax' => '(0266) 229082',
                'web' => 'http://bandungkota.bps.go.id',
                'email' => 'bps3273@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197305121994121001',
                'name' => 'Samiran,S.Si,M.T.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3273'
            ],
            [
                'id' => '198605102009022004',
                'name' => 'Ahid Nur Istinah,S.ST,M.Stat.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3273'

            ],
            [
                'id' => '3273',
                'name' => 'Admin 3273',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3273'
            ],
            // [
            //     'id' => '197707092006041003',
            //     'name' => 'Muhidin, SH',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3273'
            // ],
            [
                'id' => '19771030200212003',
                'name' => 'Harry Nurdyana Sole,S.Si,M.E.',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3273'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '198605102009022004',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3273/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
