<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kontrak;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // validasi
        $request->validate(
            [
                'nama' => 'required',
                'spesifikasi'  => 'required',
                'satuan'  => 'required',
                'volume'  => 'required',
                'harga_tawar'  => 'required',
                'harga_nego'  => 'required',


            ],
            [
                'required' => ':attribute Wajib di Isi',
            ]
        );

        // Barang
        $harga_tawar = $request->harga_tawar;
        $volume = $request->volume;
        $harga_nego = $request->harga_nego;
        $data = [
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'satuan' => $request->satuan,
            'volume' => $volume,
            'harga_tawar' => $harga_tawar,
            'harga_nego' => $harga_nego,
            'total_harga_tawar' => $harga_tawar * $volume,
            'total_harga_nego' => $harga_nego * $volume,
            'selisih_nego' => ($harga_tawar * $volume) - ($harga_nego * $volume),
            'kontrak_id' => $request->kontrak_id,
        ];
        Barang::create($data);


        // Cek Apakah barang sudah ada pada DB Barang
        $kontrak = Kontrak::where('id', $request->kontrak_id)->first();
        $barang = Barang::where('kontrak_id', $request->kontrak_id)->get()->count();

        if ($barang == 0) {
            // Jika barang belum ada
            $data = [
                'total_penawaran' => $data['total_harga_tawar'],
                'total_negosiasi' => $data['total_harga_nego'],
                'total_selisih' => $data['selisih_nego'],
            ];
        } else {
            $data = [
                'total_penawaran' => $kontrak->total_penawaran + $data['total_harga_tawar'],
                'total_negosiasi' =>  $kontrak->total_negosiasi + $data['total_harga_nego'],
                'total_selisih' => $kontrak->total_selisih + $data['selisih_nego'],
            ];
        }

        Kontrak::where('id', $request->kontrak_id)->update($data);
        return redirect()->back()->with('success', 'Barang Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        // validasi
        $request->validate(
            [
                'nama' => 'required',
                'spesifikasi'  => 'required',
                'satuan'  => 'required',
                'volume'  => 'required',
                'harga_tawar'  => 'required',
                'harga_nego'  => 'required',


            ],
            [
                'required' => ':attribute Wajib di Isi',
            ]
        );

        // Barang
        $harga_tawar = $request->harga_tawar;
        $volume = $request->volume;
        $harga_nego = $request->harga_nego;
        $data = [
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'satuan' => $request->satuan,
            'volume' => $volume,
            'harga_tawar' => $harga_tawar,
            'harga_nego' => $harga_nego,
            'total_harga_tawar' => $harga_tawar * $volume,
            'total_harga_nego' => $harga_nego * $volume,
            'selisih_nego' => ($harga_tawar * $volume) - ($harga_nego * $volume),
        ];
        Barang::where('id', $barang->id)->update($data);


        $kontrak = Kontrak::where('id', $barang->kontrak_id)->first();

        $data = [
            // Logic -> ambil total harga barang dikurangi dengan subtotal harga lama barang tersebut ditambah dengan subtotal harga baru barang tersebut
            'total_penawaran' =>  $kontrak->total_penawaran - $barang->total_harga_tawar  + $data['total_harga_tawar'],
            'total_negosiasi' =>  $kontrak->total_negosiasi - $barang->total_harga_nego + $data['total_harga_nego'],
            'total_selisih' =>  $kontrak->total_selisih - $barang->selisih_nego  + $data['selisih_nego'],
        ];


        Kontrak::where('id', $barang->kontrak_id)->update($data);
        return redirect()->back()->with('success', 'Barang Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $kontrak = Kontrak::where('id', $barang->kontrak_id)->first();

        $data = [
            'total_penawaran' =>  $kontrak->total_penawaran - $barang->total_harga_tawar,
            'total_negosiasi' =>  $kontrak->total_negosiasi - $barang->total_harga_nego,
            'total_selisih' =>  $kontrak->total_selisih - $barang->selisih_nego,
        ];


        Kontrak::where('id', $barang->kontrak_id)->update($data);
        Barang::where('id', $barang->id)->delete();
        return redirect()->back()->with('success', 'Barang Berhasil di Hapus');
    }
}
