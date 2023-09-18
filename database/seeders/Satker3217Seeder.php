<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3217Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Bandung Barat
        Satker::insert([
            [
                'id' => '3217',
                'nama_satker' => 'Kabupaten Bandung Barat',
                'alamat' => 'Jl. Raya Padalarang No.763, Ciburuy, Kec. Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553',
                'no_telp' => '(022) 6804400',
                'fax' => '(022) 6804411',
                'web' => 'http://bandungbaratkab.bps.go.id',
                'email' => 'bps3217@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196704241994031002',
                'name' => 'Ahmad Muhammad Saleh',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3217'
            ],
            [
                'id' => '197210231994121001',
                'name' => 'Deni Minarso',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3217'

            ],
            [
                'id' => '3217',
                'name' => 'Admin 3217',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3217'
            ],
            [
                'id' => '197803272006041001',
                'name' => 'Yudi Samudra, S.E.',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3217'
            ],
            [
                'id' => '198111102002121000',
                'name' => 'Herry Susanto, S.ST',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3217'
            ],
        ]);
        UserPPK::insert([
            [
                'user_id' => '197210231994121001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3217/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
