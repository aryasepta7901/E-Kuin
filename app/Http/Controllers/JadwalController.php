<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kontrak;
use Illuminate\Http\Request;

class JadwalController extends Controller
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
        $jadwal = Jadwal::where('kontrak_id', $request->kontrak_id)->where('kategori', $request->kategori)->first();
        if ($jadwal) {
            // Jika ada maka update
            $waktu =  date("Y-m-d", strtotime($request->date));
            $data = [
                'waktu' => $waktu,
            ];
            $jadwal->update($data);

            if ($jadwal->kategori == 12) {
                Kontrak::where('id', $request->kontrak_id)->update(['waktu_mulai' => $waktu]);
            } elseif ($jadwal->kategori == 13) {
                Kontrak::where('id', $request->kontrak_id)->update(['waktu_selesai' => $waktu]);
            }
            return redirect()->back()->with('success', 'Jadwal Berhasil di Ubah');
        } else {
            // Jika tidak ada maka create
            $request->validate(
                [
                    'date' => 'required',

                ],
                [
                    'required' => 'Tanggal Wajib di Isi',
                ]
            );
            $waktu =  date("Y-m-d", strtotime($request->date));
            $data = [
                'waktu' => $waktu,
                'kontrak_id' => $request->kontrak_id,
                'kategori' => $request->kategori,
            ];
            Jadwal::create($data);
            return redirect()->back()->with('success', 'Jadwal Berhasil di Tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
