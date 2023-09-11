<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Barang;
use App\Models\DendaKontrak;
use App\Models\Jadwal;
use App\Models\JenisKontrak;
use App\Models\KategoriJadwal;
use App\Models\Kontrak;
use App\Models\User;
use App\Models\UserPPK;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpWord\TemplateProcessor;

class KontrakKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('kontrak.index', [
            'title' => 'kontrak Kerja',
            'kontrak' => Kontrak::all(),

            'pbj' => User::where('role', 'PBJ')->get(),

            'ppk' => User::where('role', 'PPK')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $waktu = explode(" - ", $request->waktu);

        $mulai =  date("Y-m-d", strtotime($waktu[0]));
        $selesai =  date("Y-m-d", strtotime($waktu[1]));


        // validasi
        $request->validate(
            [
                'pekerjaan' => 'required',
                'penyedia_jasa'  => 'required',
                'ppk'  => 'required',
                'pbj'  => 'required',


            ],
            [
                'required' => ':attribute Wajib di Isi',
            ]
        );

        // Vendor
        // Cek apakah ada data dengan nilai yang sama di kolom penyedia_jasa
        $existingData = Vendor::where('penyedia_jasa', $request->penyedia_jasa)->first();
        if ($existingData) {
            $vendor = $existingData;
        } else {
            $vendor = Vendor::create(['penyedia_jasa' => $request->penyedia_jasa]);
        }
        // Kontrak
        $data = [
            'pekerjaan' => $request->pekerjaan,
            'ppk' => $request->ppk,
            'pbj' => $request->pbj,
            'id_vendor' => $vendor->id,
            'waktu_mulai' => $mulai,
            'waktu_selesai' => $selesai,

        ];
        $kontrak = Kontrak::create($data);

        // Create jadwal

        Jadwal::insert(
            [
                [
                    'waktu' => $mulai,
                    'kategori' => '12',
                    'kontrak_id' => $kontrak->id,
                ], [
                    'waktu' => $selesai,
                    'kategori' => '13',
                    'kontrak_id' => $kontrak->id,

                ]
            ]
        );

        // userPPK
        $ppk = UserPPK::where('user_id', $request->ppk)->first();
        if (!$ppk) {
            // jika tidak ada maka create
            UserPPK::create(['user_id' => $request->ppk]);
        }



        return redirect()->back()->with('success', 'Kontrak Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $kontrak)
    {

        return view('kontrak.show', [
            'master' => 'Kontrak Kerja',
            'link' => '/kontrak',
            'title' => $kontrak->pekerjaan,
            'kontrak' => $kontrak,
            'barang' => Barang::where('kontrak_id', $kontrak->id)->get(),
            'jadwal' => Jadwal::where('kontrak_id', $kontrak->id)->get(),
            'kategoriJadwal' => KategoriJadwal::all(),
            'kategoriJadwal1' => KategoriJadwal::skip(0)->take(6)->get(),
            'kategoriJadwal2' => KategoriJadwal::skip(6)->take(6)->get(),
            'kategoriJadwal3' => KategoriJadwal::skip(12)->take(6)->get(),
            'pbj' => User::where('role', 'PBJ')->get(),
            'ppk' => User::where('role', 'PPK')->get(),
            'jenis' => JenisKontrak::all(),
            'denda' => DendaKontrak::all(),
            'bank' => Bank::all(),
            'program' => [
                [
                    'id' => 'PPIS',
                    'name' => 'PPIS'
                ]
            ],

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontrak $kontrak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontrak $kontrak)
    {
        if ($request->buttonKontrak) {
            // validasi
            $request->validate(
                [
                    'pekerjaan' => 'required',
                    'no_tunjuk' => 'required',
                    'formulir_permintaan' => 'required',
                    'kode_mak' => 'required',
                    'jenis_id' => 'required',
                    'denda_id' => 'required',
                    'tanggal_dipa' => 'required',
                    'pagu_anggaran' => 'required',
                ],
                [
                    'required' => ':attribute Wajib di Isi',
                ]
            );

            // Kontrak
            $data = [
                'pekerjaan' => $request->pekerjaan,
                'no_tunjuk' => $request->no_tunjuk,
                'formulir_permintaan' => $request->formulir_permintaan,
                'kode_mak' => $request->kode_mak,
                'jenis_id' => $request->jenis_id,
                'denda_id' => $request->denda_id,
                'tanggal_dipa' => $request->tanggal_dipa,
                'pagu_anggaran' => $request->pagu_anggaran,
                'status' => 1,
            ];
            Kontrak::where('id', $kontrak->id)->update($data);
            return redirect()->back()->with('success', 'Kontrak Berhasil di Update');
        }
        if ($request->buttonVendor) {
            // validasi
            $request->validate(
                [
                    'penyedia_jasa' => 'required',
                    'nama_pejabat'  => 'required',
                    'jabatan'  => 'required',
                    'alamat_perusahaan'  => 'required',
                    'npwp'  => 'required',
                    'bank_id'  => 'required',
                    'nama_rekening'  => 'required',
                    'no_rekening'  => 'required',
                ],
                [
                    'required' => ':attribute Wajib di Isi',
                ]
            );

            // Kontrak
            $data = [
                'penyedia_jasa' => $request->penyedia_jasa,
                'nama_pejabat' => $request->nama_pejabat,
                'jabatan' => $request->jabatan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'npwp' => $request->npwp,
                'bank_id' => $request->bank_id,
                'nama_rekening' => $request->nama_rekening,
                'no_rekening' => $request->no_rekening,
                'status' => 1,

            ];
            Vendor::where('id', $kontrak->id_vendor)->update($data);
            return redirect()->back()->with('success', 'Vendor Berhasil di Update');
        }
        if ($request->buttonPenanggungJawab) {
            // validasi
            $request->validate(
                [
                    'pbj' => 'required',
                    'ppk'  => 'required',

                ],
                [
                    'required' => ':attribute Wajib di Isi',
                ]
            );

            // Kontrak
            $dataKontrak = [
                'pbj' => $request->pbj,
                'ppk' => $request->ppk,
            ];
            Kontrak::where('id', $kontrak->id)->update($dataKontrak);

            return redirect()->back()->with('success', 'Penanggung Jawab Berhasil di Update');
        }
    }

    public function cetak(Request $request)
    {
        function terbilang($angka)
        {
            $angka = floatval($angka);
            $bilangan = array(
                '0' => '',
                '1' => 'satu',
                '2' => 'dua',
                '3' => 'tiga',
                '4' => 'empat',
                '5' => 'lima',
                '6' => 'enam',
                '7' => 'tujuh',
                '8' => 'delapan',
                '9' => 'sembilan',
                '10' => 'sepuluh',
                '11' => 'sebelas'
            );

            if ($angka < 12) {
                return $bilangan[$angka];
            } elseif ($angka < 20) {
                return $bilangan[$angka - 10] . ' belas';
            } elseif ($angka < 100) {
                return $bilangan[floor($angka / 10)] . ' puluh ' . $bilangan[$angka % 10];
            } elseif ($angka < 200) {
                return 'seratus ' . terbilang($angka - 100);
            } elseif ($angka < 1000) {
                return $bilangan[floor($angka / 100)] . ' ratus ' . terbilang($angka % 100);
            } elseif ($angka < 2000) {
                return 'seribu ' . terbilang($angka - 1000);
            } elseif ($angka < 1000000) {
                return terbilang(floor($angka / 1000)) . ' ribu ' . terbilang($angka % 1000);
            } elseif ($angka < 1000000000) {
                return terbilang(floor($angka / 1000000)) . ' juta ' . terbilang($angka % 1000000);
            } else {
                return 'Angka terlalu besar untuk diubah.';
            }
        }
        function italic($text)
        {
            return "<em>{$text}</em>";
        }
        // Script PhpWord
        // Creating the new document...
        $phpWord = new TemplateProcessor('kuitansi.docx');
        // Model
        $kontrak = Kontrak::where('id', $request->kontrak_id)->first();
        $barang =  Barang::where('kontrak_id', $request->kontrak_id)->get();
        $jadwal = Jadwal::where('kontrak_id', $request->kontrak_id)->get();
        // Logic Selisih tanggal
        $startDate = $kontrak->waktu_mulai;
        $endDate = $kontrak->waktu_selesai;

        $carbonStartDate = Carbon::parse($startDate);
        $carbonEndDate = Carbon::parse($endDate);

        $differenceInDays = $carbonEndDate->diffInDays($carbonStartDate);
        // Selisih penawaran dan nego
        // Edit String
        $netto = round(($kontrak->total_negosiasi) - ((11 / 111) * $kontrak->total_negosiasi) - ((1.5 / 111) * $kontrak->total_negosiasi));
        $phpWord->setValues([
            'PEKERJAAN' => strtoupper($kontrak->pekerjaan),
            'pekerjaan' => $kontrak->pekerjaan,
            'total_hps' => number_format($kontrak->total_hps, 2, ',', '.'),
            'textTotal_hps' => terbilang($kontrak->total_hps),
            'total_nego' => number_format($kontrak->total_negosiasi, 2, ',', '.'),
            'ppn' => number_format(round((11 / 111) * $kontrak->total_negosiasi), 2, ',', '.'),
            'pph' => number_format(round((1.5 / 111) * $kontrak->total_negosiasi), 2, ',', '.'),
            'netto' => number_format($netto, 2, ',', '.'),
            'textTotal_nego' => terbilang($kontrak->total_negosiasi),
            'total_tawar' => number_format($kontrak->total_penawaran, 2, ',', '.'),
            'textTotal_tawar' => terbilang($kontrak->total_penawaran),

            'total_selisih' => number_format($kontrak->total_selisih, 2, ',', '.'),
            'textTotal_selisih' => terbilang($kontrak->total_selisih),

            'waktu_mulai' => Carbon::parse($kontrak->waktu_mulai)->isoFormat('DD MMMM YYYY', 'id'),
            'ta' => Carbon::parse($kontrak->waktu_mulai)->isoFormat('YYYY', 'id'),
            'waktu_selesai' => Carbon::parse($kontrak->waktu_selesai)->isoFormat('DD MMMM YYYY', 'id'),
            'selisih_hari' => $differenceInDays + 1,
            'textSelisih_hari' => ucfirst(terbilang($differenceInDays + 1)),
            'no_tunjuk' => $kontrak->no_tunjuk,
            'kode_mak' => $kontrak->kode_mak,
            'pagu_anggaran' => number_format($kontrak->pagu_anggaran, 2, ',', '.'),
            'TextPagu_anggaran' => terbilang($kontrak->pagu_anggaran),
            'tanggal_dipa' => Carbon::parse($kontrak->tanggal_dipa)->isoFormat('DD MMMM YYYY', 'id'),
            'formulir_permintaan' => $kontrak->formulir_permintaan,
            'jenis_kontrak' => $kontrak->jenis->jenis,
            'denda' => $kontrak->denda->denda,

        ]);
        $phpWord->setValues([
            'date_fp' => Carbon::parse($jadwal->where('kategori', 1)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'date_kak' => Carbon::parse($jadwal->where('kategori', 2)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'date_hps' => Carbon::parse($jadwal->where('kategori', 3)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),

            'date_hpss' => Carbon::parse($jadwal->where('kategori', 4)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_hpss' => Carbon::parse($jadwal->where('kategori', 4)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_hpss' => terbilang(Carbon::parse($jadwal->where('kategori', 4)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_hpss' => Carbon::parse($jadwal->where('kategori', 4)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_hpss' => terbilang(Carbon::parse($jadwal->where('kategori', 4)->first()->waktu)->isoFormat('YYYY', 'id')),

            'date_prk' => Carbon::parse($jadwal->where('kategori', 5)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'date_pbj' => Carbon::parse($jadwal->where('kategori', 6)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),

            'date_ppl' => Carbon::parse($jadwal->where('kategori', 7)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_ppl' => Carbon::parse($jadwal->where('kategori', 7)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_ppl' => terbilang(Carbon::parse($jadwal->where('kategori', 7)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_ppl' => Carbon::parse($jadwal->where('kategori', 7)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_ppl' => terbilang(Carbon::parse($jadwal->where('kategori', 7)->first()->waktu)->isoFormat('YYYY', 'id')),



            'date_sppn' => Carbon::parse($jadwal->where('kategori', 8)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_sppn' => Carbon::parse($jadwal->where('kategori', 8)->first()->waktu)->isoFormat('dddd', 'id'),


            'date_sph' => Carbon::parse($jadwal->where('kategori', 9)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_sph' => Carbon::parse($jadwal->where('kategori', 9)->first()->waktu)->isoFormat('dddd', 'id'),


            'date_nth' => Carbon::parse($jadwal->where('kategori', 10)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_nth' => Carbon::parse($jadwal->where('kategori', 10)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_nth' => terbilang(Carbon::parse($jadwal->where('kategori', 10)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_nth' => Carbon::parse($jadwal->where('kategori', 10)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_nth' => terbilang(Carbon::parse($jadwal->where('kategori', 10)->first()->waktu)->isoFormat('YYYY', 'id')),


            'date_hpl' => Carbon::parse($jadwal->where('kategori', 11)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_hpl' => Carbon::parse($jadwal->where('kategori', 11)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_hpl' => terbilang(Carbon::parse($jadwal->where('kategori', 11)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_hpl' => Carbon::parse($jadwal->where('kategori', 11)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_hpl' => terbilang(Carbon::parse($jadwal->where('kategori', 11)->first()->waktu)->isoFormat('YYYY', 'id')),



            'date_sppa' => Carbon::parse($jadwal->where('kategori', 12)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_sppa' => Carbon::parse($jadwal->where('kategori', 12)->first()->waktu)->isoFormat('dddd', 'id'),


            'date_bpp' => Carbon::parse($jadwal->where('kategori', 13)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),

            'date_thp' => Carbon::parse($jadwal->where('kategori', 14)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_thp' => Carbon::parse($jadwal->where('kategori', 14)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_thp' => terbilang(Carbon::parse($jadwal->where('kategori', 14)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_thp' => Carbon::parse($jadwal->where('kategori', 14)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_thp' => terbilang(Carbon::parse($jadwal->where('kategori', 14)->first()->waktu)->isoFormat('YYYY', 'id')),



            'date_spb' => Carbon::parse($jadwal->where('kategori', 15)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'date_i' => Carbon::parse($jadwal->where('kategori', 16)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),


            'date_ppk' => Carbon::parse($jadwal->where('kategori', 17)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_ppk' => Carbon::parse($jadwal->where('kategori', 17)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_ppk' => terbilang(Carbon::parse($jadwal->where('kategori', 17)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_ppk' => Carbon::parse($jadwal->where('kategori', 17)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_ppk' => terbilang(Carbon::parse($jadwal->where('kategori', 17)->first()->waktu)->isoFormat('YYYY', 'id')),


            'date_bap' => Carbon::parse($jadwal->where('kategori', 18)->first()->waktu)->isoFormat('DD MMMM YYYY', 'id'),
            'hari_bap' => Carbon::parse($jadwal->where('kategori', 18)->first()->waktu)->isoFormat('dddd', 'id'),
            'tanggal_bap' => terbilang(Carbon::parse($jadwal->where('kategori', 18)->first()->waktu)->isoFormat('DD', 'id')),
            'bulan_bap' => Carbon::parse($jadwal->where('kategori', 18)->first()->waktu)->isoFormat('MMMM', 'id'),
            'tahun_bap' => terbilang(Carbon::parse($jadwal->where('kategori', 18)->first()->waktu)->isoFormat('YYYY', 'id')),

        ]);

        $KPA = User::where('role', 'KPA')->first();
        $BP = User::where('role', 'BP')->first();

        $phpWord->setValues([
            'nama_ppk' => $kontrak->name_ppk->name,
            'nip_ppk' => $kontrak->name_ppk->id,
            'program' => $kontrak->userPPK->program,
            'no_surat_tugas' => $kontrak->userPPK->no_surat_tugas,
            'tanggal_surat_tugas' => Carbon::parse($kontrak->userPPK->tanggal_surat_tugas)->isoFormat('DD MMMM YYYY', 'id'),
            'tahun_surat_tugas' => Carbon::parse($kontrak->userPPK->tanggal_surat_tugas)->isoFormat('YYYY', 'id'),

            'nama_pbj' => $kontrak->name_pbj->name,
            'nip_pbj' => $kontrak->name_pbj->id,

            'nama_kpa' => $KPA->name,
            'nip_kpa' => $KPA->id,

            'nama_bp' => $BP->name,
            'nip_bp' => $BP->id,



        ]);
        $phpWord->setValues([
            'vendor' => $kontrak->vendor->penyedia_jasa,
            'nama_pejabat' => $kontrak->vendor->nama_pejabat,
            'jabatan' => $kontrak->vendor->jabatan,
            'alamat' => $kontrak->vendor->alamat_perusahaan,
            'no_rek' => $kontrak->vendor->no_rekening,
            'nama_rekening' => $kontrak->vendor->nama_rekening,
            'npwp' => $kontrak->vendor->npwp,
            'bank' => $kontrak->vendor->bank->nama_bank,

        ]);
        $dataBarang = [];
        $noBarang = 1;
        foreach ($barang as $b) {

            $dataBarang[] = [
                'no_barang' => $noBarang++,
                'nama_barang' => $b->nama,
                'spesifikasi' => $b->spesifikasi,
                'volume' => $b->volume,
                'satuan' => $b->satuan,
                'harga_hps' => number_format($b->harga_hps, 2, ',', '.'),
                'subtotal_hps' => number_format($b->total_harga_hps, 2, ',', '.'),
                'harga_tawar' => number_format($b->harga_tawar, 2, ',', '.'),
                'subtotal_tawar' => number_format($b->total_harga_tawar, 2, ',', '.'),
                'harga_nego' => number_format($b->harga_nego, 2, ',', '.'),
                'subtotal_nego' => number_format($b->total_harga_nego, 2, ',', '.'),
                'selisih_nego' => number_format($b->selisih_nego, 2, ',', '.'),


            ];
        }
        $phpWord->cloneRowAndSetValues('nama_barang', $dataBarang);
        $phpWord->cloneRowAndSetValues('nama_barang', $dataBarang);
        $phpWord->cloneRowAndSetValues('nama_barang', $dataBarang);
        $phpWord->cloneRowAndSetValues('nama_barang', $dataBarang);
        $phpWord->cloneRowAndSetValues('nama_barang', $dataBarang);



        // Simpan hasil proses ke file Word sementara   
        // $fileName = 'Kuitansi_' . $request->satker . '_Tahap_' . $tahap . '.docx';
        // $fileName = 'Kuitansi_' . $kontrak->pekerjaan . '.docx';
        $phpWord->saveAs('kuitansi1.docx');
        return response()->download('kuitansi1.docx')->deleteFileAfterSend(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontrak $kontrak)
    {
        Kontrak::destroy($kontrak->id);
        return redirect()->back()->with('success', 'Kontrak Berhasil di Hapus');
    }
}
