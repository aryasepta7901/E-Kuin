<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3201Seeder extends Seeder
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
                'id' => '3201',
                'nama_satker' => 'Kabupaten Bogor',
                'alamat' => 'Jl. Bersih Komplek Perkantoran Pemda Cibinong, Kabupaten Bogor',
                'no_telp' => '(021) 8751070',
                'fax' => '(021) 87913862',
                'web' => 'http://bogorkab.bps.go.id',
                'email' => 'bps3201@bps.go.id',
            ],
        ]);
        User::insert([
            // BPS Kabupaten Bogor
            [
                'id' => '196809101993032001',
                'name' => 'Raden Gandari Adianti Aju Fatimah',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3201'
            ],
            [
                'id' => '198412132009022011',
                'name' => 'Dinar Widianingrum, A.Md',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'BP',
                'satker_id' => '3201'

            ],
            [
                'id' => '3201',
                'name' => 'Admin 3201',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3201'
            ],
            [
                'id' => '198512132008012005',
                'name' => 'Alin Fadlina Hayati',
                'role' => 'PPK',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3201'
            ],
            [
                'id' => '196710121994011001',
                'name' => 'Supriyadi',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3201'
            ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '198512132008012005',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3201/PB',
                'tanggal_surat_tugas' => '2023-01-01',
            ],
        ]);
    }
}
