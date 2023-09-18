<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Satker3202Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BPS Kabupaten Sukabumi
        Satker::insert([
            [
                'id' => '3202',
                'nama_satker' => 'Kabupaten Sukabumi',
                'alamat' => 'Jalan Raya Karang Tengah Km. 14 No. 52 Karangtengah Cibadak, Karangtengah, Kabupaten Sukabumi, Jawa Barat 43351',
                'no_telp' => '(0266) 536953',
                'fax' => '(0653) 536949',
                'web' => 'http://sukabumikab.bps.go.id',
                'email' => 'bps3202@bps.go.id',
            ],
        ]);
        User::insert([
            // BPS Kabupaten Bogor
            [
                'id' => '196909101991011001',
                'name' => 'Saman, S. Si',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3202'
            ],
            [
                'id' => '198003182004121001',
                'name' => 'Nuryanto',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'PPK',
                'satker_id' => '3202'

            ],
            [
                'id' => '3202',
                'name' => 'Admin 3202',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3202'
            ],
            // [
            //     'id' => '198512132008012005',
            //     'name' => 'Alin Fadlina Hayati',
            //     'role' => 'BP',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3202'
            // ],
            // [
            //     'id' => '196710121994011001',
            //     'name' => 'Supriyadi',
            //     'role' => 'PBJ',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            //     'satker_id' => '3202'
            // ],


        ]);
        UserPPK::insert([
            [
                'user_id' => '198003182004121001',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3202/PB',
                'tanggal_surat_tugas' => '2023-02-02',
            ],
        ]);
    }
}
