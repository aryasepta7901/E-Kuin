<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bank;
use App\Models\DendaKontrak;
use App\Models\JenisKontrak;
use App\Models\KategoriJadwal;
use App\Models\Satker;
use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. 
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Kabupaten Bogor
        $this->call(Satker3201Seeder::class);
        $this->call(Satker3202Seeder::class);
        $this->call(Satker3203Seeder::class);
        $this->call(Satker3204Seeder::class);
        $this->call(Satker3205Seeder::class);
        $this->call(Satker3206Seeder::class);
        $this->call(Satker3207Seeder::class);
        $this->call(Satker3208Seeder::class);
        $this->call(Satker3209Seeder::class);
        $this->call(Satker3210Seeder::class);
        $this->call(Satker3211Seeder::class);
        $this->call(Satker3212Seeder::class);
        $this->call(Satker3213Seeder::class);
        $this->call(Satker3214Seeder::class);
        $this->call(Satker3215Seeder::class);
        $this->call(Satker3216Seeder::class);
        $this->call(Satker3217Seeder::class);
        $this->call(Satker3271Seeder::class);
        $this->call(Satker3272Seeder::class);
        $this->call(Satker3273Seeder::class);
        $this->call(Satker3274Seeder::class);
        $this->call(Satker3275Seeder::class);
        $this->call(Satker3276Seeder::class);
        $this->call(Satker3277Seeder::class);
        $this->call(Satker3278Seeder::class);
        $this->call(Satker3279Seeder::class);


        KategoriJadwal::insert([
            ['nama' => 'Formulir Permintaan'],
            ['nama' => 'KAK'],
            ['nama' => 'Kertas Kerja Penyusunan HPS'],
            ['nama' => 'BA Penyusunan HPS dan Spesifikasi'],
            ['nama' => 'BA Penetapan Rancangan Kontrak'],
            ['nama' => 'Permintaan Pemilihan Penyedia Barang/Jasa'],
            ['nama' => 'BA Reviu Dokumen Persiapan Pengadaan Langsung'],
            ['nama' => 'Surat Permintaan Penawaran'],
            ['nama' => 'Surat Penawaran Harga'],
            ['nama' => 'BA Klarifikasi dan Negosiasi Teknis dan Harga'],
            ['nama' => 'BA Hasil Pengadaan Langsung'],
            ['nama' => 'Surat Penunjukan Penyedia'],
            ['nama' => 'BA Pemeriksaan Pekerjaan'],
            ['nama' => 'BA Serah Terima Hasil Pekerjaan'],
            ['nama' => 'Surat Permohonan Pembayaran'],
            ['nama' => 'Invoice'],
            ['nama' => 'BA Serah Terima Hasil Pekerjaan PPK ke KPA'],
            ['nama' => 'Berita Acara Pembayaran'],

        ]);
        JenisKontrak::insert([
            ['jenis' => 'Lumsum'],
            ['jenis' => 'Harga Satuan'],
            ['jenis' => 'Harga Gabungan'],
        ]);
        DendaKontrak::insert([
            ['denda' => '1 ‰ dari harga kontrak'],
            ['denda' => '1 ‰ dari harga sebagian kontrak'],
        ]);
        Satker::insert([
            [
                'id' => '3200',
                'nama_satker' => 'Provinsi Jawa Barat',
                'alamat' => 'Jl. Penghulu. H. Hasan Mustofa No. 43 Bandung 40124',
                'no_telp' => '(022) 7272595  -  701696',
                'fax' => '(022) 7213572',
                'web' => 'http://jabar.bps.go.id',
                'email' => 'bps3200@bps.go.id',
            ],
        ]);

        User::insert([
            // BPS Jabar
            [
                'id' => '196408141987021001',
                'name' => 'Marsudijono, S.Si, M.M',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA',
                'satker_id' => '3200'
            ],
            [
                'id' => '198611262009021001',
                'name' => 'Pagin Nugraha, S.E.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'BP',
                'satker_id' => '3200'

            ], [
                'id' => '198702202010121004',
                'name' => 'Iskandar Ahmaddien, S.ST., S.E., M.M',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password], 
                'satker_id' => '3200'
            ],
            [
                'id' => '198004102009021010',
                'name' => 'Eko Dwi Mulyono, S.SI, M.M',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3200'
            ],
            [
                'id' => '198806162008012001',
                'name' => 'Asri Yuniar, SE',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3200'
            ],
            [
                'id' => '199512302022031009',
                'name' => 'Darwin Armando Pakpahan',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3200'
            ],
            [
                'id' => '198408142006041006',
                'name' => 'Agus Susanto, S.Stat, M.H',
                'role' => 'PPK',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3200'
            ],
            [
                'id' => '198111122009021104',
                'name' => 'Anas Bahtiar',
                'role' => 'PPK',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
                'satker_id' => '3200'
            ],

        ]);
        UserPPK::insert([
            [
                'user_id' => '198111122009021104',
                'program' => 'Dukman',
                'no_surat_tugas' => '0426001/3100/PB',
                'tanggal_surat_tugas' => '2023-03-18',
            ],
            [
                'user_id' => '198408142006041006',
                'program' => 'PPIS',
                'no_surat_tugas' => '0426002/3200/BP',
                'tanggal_surat_tugas' => '2023-04-26',
            ],



        ]);
        Bank::insert([
            ['nama_bank' => 'BRI'],
            ['nama_bank' => 'Mandiri'],
            ['nama_bank' => 'BNI'],
            ['nama_bank' => 'BTN'],
            ['nama_bank' => 'BCA'],
        ]);
    }
}
