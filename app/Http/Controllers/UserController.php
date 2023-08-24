<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPPK;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users', [
            'title' => 'Data Pengguna',
            'pbj' => User::where('role', 'pbj')->get(),
            'ppk' => User::where('role', 'ppk')->get(),
            'bp' => User::where('role', 'BP')->first(),
            'kpa' => User::where('role', 'KPA')->first(),

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
        // validasi
        $request->validate(
            [
                'nama' => 'required',
                'nip'  => 'required|max:18|min:18|unique:users,id',


            ],
            [
                'required' => ':attribute Wajib di Isi',
                'unique' => 'NIP sudah terdaftar',
            ]
        );

        $data = [
            'id' => $request->nip,
            'name' => $request->nama,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'PBJ',

        ];
        User::create($data);
        return redirect()->back()->with('success', 'PBJ Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // validasi
        if ($user->id == $request->nip) {
            // Jika NIP tidak berubah, maka
            $valid_nip = 'required|max:18|min:18';
        } else {
            // Jika NIP berubah
            $valid_nip = 'required|max:18|min:18|unique:users,id';
        }
        $request->validate(
            [
                'nama' => 'required',
                'nip'  => $valid_nip,
            ],
            [
                'required' => ':attribute Wajib di Isi',
                'unique' => 'NIP sudah terdaftar',
            ]
        );
        $data = [
            'id' => $request->nip,
            'name' => $request->nama,

        ];
        User::where('id', strval($user->id))->update($data);
        if ($request->buttonUser) {
            return redirect()->back()->with('success', $request->buttonUser . ' Berhasil di Ubah');
        }
        if ($request->buttonPPK) {
            $dataPPK = [
                'no_surat_tugas' => $request->no_surat_tugas,
                'tanggal_surat_tugas' => $request->tanggal_surat_tugas,
                'user_id' => $request->nip,
            ];
            UserPPK::where('user_id', strval($user->id))->update($dataPPK);
            return redirect()->back()->with('success', 'PPK dengan program ' . $request->program . ' Berhasil di Ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Delete PBJ
        User::destroy(strval($user->id));
        return redirect()->back()->with('success', 'PBJ Berhasil di Hapus');
    }
}
