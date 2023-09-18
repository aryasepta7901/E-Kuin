<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3210Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Majalengka
        Satker::insert([
            [
                'id' => '3210',
                'nama_satker' => 'Kabupaten Majalengka',
                'alamat' => 'Jl. Gerakan Koperasi No. 39 Majalengka 45411',
                'no_telp' => '(0233) 281055',
                'fax' => '(0233) 281055',
                'web' => 'http://majalengkakab.bps.go.id',
                'email' => 'bps3210@bps.go.id',
            ],
        ]);
        User::insert([
            [
                'id' => '196801181989021001',
                'name' => 'Joni Kasmuri',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3210'
            ],
            [
                'id' => '197702221999012002',
                'name' => 'Fenty Jimika',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3210'

            ],
            [
                'id' => '3210',
                'name' => 'Admin 3210',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3210'
            ],
            // [
            //     'id' => '198512112011012016',
            //     'name' => 'Ikeu Pujawanti',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3210'
            // ],
            [
                'id' => '198211252006021001',
                'name' => 'Sukadi',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3210'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '197702221999012002',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3210/PB',
                'tanggal_surat_tugas' => '2023-04-04',
            ],
        ]);
    }
}
