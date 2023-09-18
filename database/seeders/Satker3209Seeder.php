<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3209Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Cirebon
        Satker::insert([
            [
                'id' => '3209',
                'nama_satker' => 'Kabupaten Cirebon',
                'alamat' => 'Jl. Sunan Kalijaga No. 4 Sumber Cirebon',
                'no_telp' => '(0231) 321445',
                'fax' => '(0231) 321445',
                'web' => 'http://cirebonkab.bps.go.id',
                'email' => 'bps3209@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '197007011992111001',
                'name' => 'Judiharto Trisnadi',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3209'
            ],
            [
                'id' => '198304052006041002',
                'name' => 'Supriyanto',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3209'

            ],
            [
                'id' => '3209',
                'name' => 'Admin 3209',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3209'
            ],
            // [
            //     'id' => '198512112011012016',
            //     'name' => 'Ikeu Pujawanti',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3209'
            // ],
            [
                'id' => '197606172006041003',
                'name' => 'Setia Budhi',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3209'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '198304052006041002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3209/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
