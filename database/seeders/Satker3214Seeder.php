<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3214Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Purwakarta
        Satker::insert([
            [
                'id' => '3214',
                'nama_satker' => 'Kabupaten Purwakarta',
                'alamat' => 'Jl.Syeikh Baing Yusuf, RT 031 RW 09 Maracang, Purwakarta',
                'no_telp' => ' (0264) 201960',
                'fax' => ' (0264) 201960',
                'web' => 'http://purwakartakab.bps.go.id',
                'email' => 'bps3214@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196912101991121001',
                'name' => 'Dani Jaelani,S.Si.,M.T',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3214'
            ],
            [
                'id' => '197604191999011001',
                'name' => 'Mohamad Fauzi,S.ST',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3214'

            ],
            [
                'id' => '3214',
                'name' => 'Admin 3214',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3214'
            ],
            [
                'id' => '198709182009022005',
                'name' => 'Anneke Ayu Indreswari,SE',
                'role' => 'BP',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3214'
            ],
            [
                'id' => '197704152006041004',
                'name' => 'Yusuf Priatna Candra Purnama,SP',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3214'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '197604191999011001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3214/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
