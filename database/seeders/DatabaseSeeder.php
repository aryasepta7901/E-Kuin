<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bank;
use App\Models\DendaKontrak;
use App\Models\JenisKontrak;
use App\Models\KategoriJadwal;
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
            ['jenis' => 'Harga Satuan dan Gabungan'],
        ]);
        DendaKontrak::insert([
            ['denda' => '1 ‰ dari harga kontrak'],
            ['denda' => '1 ‰ dari harga sebagian kontrak'],
        ]);
        User::insert([
            [
                'id' => '196408141987021001',
                'name' => 'Marsudijono, S.Si, M.M',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'KPA'
            ],
            [
                'id' => '198611262009021001',
                'name' => 'Pagin Nugraha, S.E.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'BP'
            ], [
                'id' => '198702202010121004',
                'name' => 'Iskandar Ahmaddien, S.ST., S.E., M.M',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            ], [
                'id' => '200107090100005167',
                'name' => 'Muhammad Arya Septa Kovitra',
                'role' => 'A',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            ],
            [
                'id' => '198004102009021010',
                'name' => 'Eko Dwi Mulyono, S.SI, M.M',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            ],
            [
                'id' => '198806162008012001',
                'name' => 'Asri Yuniar, SE',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            ],
            [
                'id' => '199512302022031009',
                'name' => 'Darwin Armando Pakpahan',
                'role' => 'PBJ',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            ],
            [
                'id' => '198408142006041006',
                'name' => 'Agus Susanto, S.Stat, M.H',
                'role' => 'PPK',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
            ],
            [
                'id' => '198111122009021104',
                'name' => 'Anas Bahtiar',
                'role' => 'PPK',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password],
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
