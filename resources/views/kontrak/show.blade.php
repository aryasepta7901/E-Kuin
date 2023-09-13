@extends('layouts.backEnd.main')

@section('content')
    <div class="col-lg-12">
        @if ($kontrak->vendor->status != 1 || $kontrak->status != 1 || $jadwal->count() != 18 || $barang->count() == 0)
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Harap lengkapi isian agar dapat mengunduh dokumen hasil generate
            </div>
        @else
            @if ($kontrak->total_negosiasi <= 50000000 && $kontrak->total_negosiasi >= 10000000)
                {{-- bisa digunakan untuk nilai kontrak >10jt dan <50jt --}}
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Lengkap!</h5>
                    Dokumen Bisa di Download
                    <hr>
                    <form action="/kontrak/cetak" method="post">
                        @csrf
                        <input type="hidden" name="kontrak_id" value="{{ $kontrak->id }}">
                        <button type="submit">Silahkan klik ini untuk download</button>
                    </form>
                </div>
            @else
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Informasi!</h5>
                    Kontrak Minimal Rp10.000.000,00 dan Maksimal Rp50.000.000,00
                </div>
            @endif
        @endif

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <label for="">Kontrak Kerja</label>

                <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#editKontrak"><i
                        class="fa fa-pen">
                    </i></button>
            </div>
            {{-- <div class="card-body">   
            </div> --}}
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-5"> Paket Pekerjaan</dt>
                    <dd class="col-sm-7">{{ $kontrak->pekerjaan }}</dd>

                    <dt class="col-sm-5">Waktu Pelaksanaan</dt>
                    @php
                        $startDate = $kontrak->waktu_mulai;
                        $endDate = $kontrak->waktu_selesai;
                        
                        $carbonStartDate = Illuminate\Support\Carbon::parse($startDate);
                        $carbonEndDate = Illuminate\Support\Carbon::parse($endDate);
                        
                        $differenceInDays = $carbonEndDate->diffInDays($carbonStartDate);
                        
                    @endphp
                    <dd class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-7">
                                <input type="text" disabled name="waktu" class="form-control float-right"
                                    id="reservation" data-start="{{ date('m/d/Y', strtotime($kontrak->waktu_mulai)) }}"
                                    data-end="{{ date('m/d/Y', strtotime($kontrak->waktu_selesai)) }}">
                            </div>
                            <div class="col-sm-5">
                                <button class="badge badge-info">{{ $differenceInDays + 1 }} Hari </button>
                            </div>
                        </div>
                    </dd>
                    <dt class="col-sm-5">Nomor Petunjuk</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->no_tunjuk == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->no_tunjuk }}
                        @endif
                    </dd>
                    <dt class="col-sm-5">Nomor Formulir Permintaan</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->formulir_permintaan == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->formulir_permintaan }}
                        @endif
                    </dd>
                    <dt class="col-sm-5">Kode MAK</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->kode_mak == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->kode_mak }}
                        @endif
                    </dd>
                    <dt class="col-sm-5">Jenis Kontrak</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->jenis_id == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->jenis->jenis }}
                        @endif
                    </dd>
                    <dt class="col-sm-5">Denda Terlambat</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->denda_id == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->denda->denda }}
                        @endif
                    </dd>
                    <dt class="col-sm-5">Pagu Anggaran</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->pagu_anggaran == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            <button
                                class="badge badge-sm badge-info">Rp{{ number_format($kontrak->pagu_anggaran, 2, ',', '.') }}</button>
                        @endif
                    </dd>
                    <dt class="col-sm-5">Tanggal Daftar Isian Pelaksanaan Anggaran (DIPA)</dt>
                    <dd class="col-sm-7">
                        @if ($kontrak->tanggal_dipa == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ Illuminate\Support\Carbon::parse($kontrak->tanggal_dipa)->isoFormat('dddd, D MMMM Y', 'id') }}
                        @endif
                    </dd>


                </dl>
            </div>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <label for="">Penanggung Jawab</label>

                <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#editPenanggungJawab"><i
                        class="fa fa-pen">
                    </i></button>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">PBJ</dt>
                    <dd class="col-sm-8">
                        {{ $kontrak->name_pbj->name }} (NIP: {{ $kontrak->pbj }})
                    </dd>

                </dl>
                <hr>
                <dl class="row">
                    <dt class="col-sm-4">PPK</dt>
                    <dd class="col-sm-8">
                        {{ $kontrak->name_ppk->name }}(NIP: {{ $kontrak->pbj }})
                    </dd>
                    <dt class="col-sm-4">Program</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->userPPK->program == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            <p>{{ $kontrak->userPPK->program }}</p>
                        @endif
                    </dd>
                    <dt class="col-sm-4">No Surat Tugas</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->userPPK->no_surat_tugas == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            <p>{{ $kontrak->userPPK->no_surat_tugas }}</p>
                            {{-- {{ Illuminate\Support\Carbon::parse($kontrak->tanggal_dipa)->isoFormat('dddd, D MMMM Y', 'id') }} --}}
                        @endif
                    </dd>
                    <dt class="col-sm-4">Tanggal Surat Tugas</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->userPPK->tanggal_surat_tugas == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ Illuminate\Support\Carbon::parse($kontrak->userPPK->tanggal_surat_tugas)->isoFormat('dddd, D MMMM Y', 'id') }}
                        @endif
                    </dd>

                </dl>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <label for="">Penyedia Jasa</label>

                <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#editVendor"><i
                        class="fa fa-pen">
                    </i></button>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Vendor</dt>
                    <dd class="col-sm-8">{{ $kontrak->vendor->penyedia_jasa }}</dd>
                    <dt class="col-sm-4">Nama Pejabat</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->vendor->nama_pejabat == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->vendor->nama_pejabat }}
                        @endif
                    </dd>
                    <dt class="col-sm-4">Jabatan</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->vendor->jabatan == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->vendor->jabatan }}
                        @endif
                    </dd>
                    <dt class="col-sm-4">Alamat Vendor</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->vendor->alamat_perusahaan == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->vendor->alamat_perusahaan }}
                        @endif

                    </dd>
                    <dt class="col-sm-4">NPWP</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->vendor->npwp == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->vendor->npwp }}
                        @endif

                    </dd>
                    <dt class="col-sm-4">Nama Rekening</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->vendor->nama_rekening == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->vendor->nama_rekening }}
                        @endif

                    </dd>
                    <dt class="col-sm-4">Nomor Rekening</dt>
                    <dd class="col-sm-8">
                        @if ($kontrak->vendor->no_rekening == null)
                            <span style="color: red;">Harap Isi</span>
                        @else
                            {{ $kontrak->vendor->no_rekening }} ({{ $kontrak->vendor->bank->nama_bank }})
                        @endif

                    </dd>

                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <label for="">Barang/Jasa</label>

                <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#tambahBarang"><i
                        class="fa fa-plus">
                    </i></button>
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Spesifikasi</th>
                            <th class="text-center">Volume</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">HPS</th>
                            <th class="text-center">Subtotal HPS</th>
                            <th class="text-center">Harga Penawaran</th>
                            <th class="text-center">Subtotal Penawaran</th>
                            <th class="text-center">Harga Negosiasi</th>
                            <th class="text-center">Subtotal Negosiasi</th>
                            <th class="text-center">Selisih Negosiasi</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($barang as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->spesifikasi }}</td>
                                <td class="text-center"><button class="badge badge-info">{{ $value->volume }}</button>
                                </td>
                                <td>{{ $value->satuan }}</td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->harga_hps, 2, ',', '.') }}</button>
                                </td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->total_harga_hps, 2, ',', '.') }}</button>
                                </td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->harga_tawar, 2, ',', '.') }}</button>
                                </td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->total_harga_tawar, 2, ',', '.') }}</button>
                                </td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->harga_nego, 2, ',', '.') }}</button>
                                </td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->total_harga_nego, 2, ',', '.') }}</button>
                                </td>
                                <td class="text-center"><button
                                        class="badge badge-sm badge-info">Rp{{ number_format($value->selisih_nego, 2, ',', '.') }}</button>
                                </td>
                                <td> <button class="btn btn-sm btn-info ml-auto" data-toggle="modal"
                                        data-target="#editBarang{{ $value->id }}"><i class="fa fa-pen">
                                        </i></button>
                                    <button class="btn btn-sm btn-danger ml-auto" data-toggle="modal"
                                        data-target="#hapusBarang{{ $value->id }}"><i class="fa fa-trash">
                                        </i></button>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <th colspan="5" class="text-center">Total</th>
                        <th class="bg-dark"></th>
                        <th class="text-center"><button
                                class="badge badge-sm badge-info">Rp{{ number_format($kontrak->total_hps, 2, ',', '.') }}</button>
                        </th>
                        <th class="bg-dark"></th>
                        <th class="text-center"><button
                                class="badge badge-sm badge-info">Rp{{ number_format($kontrak->total_penawaran, 2, ',', '.') }}</button>
                        </th>
                        <th class="bg-dark"></th>
                        <th class="text-center"><button
                                class="badge badge-info">Rp{{ number_format($kontrak->total_negosiasi, 2, ',', '.') }}</button>
                        </th>

                        <th class="text-center"><button
                                class="badge badge-info">Rp{{ number_format($kontrak->total_selisih, 2, ',', '.') }}</button>
                        </th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Timelime example  -->
    <div class="col-md-12">
        <!-- The time line -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <label for="">Jadwal Pekerjaan</label>

                {{-- <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#editJadwal"><i
                        class="fa fa-pen">
                    </i></button> --}}
            </div>
            <div class="card-body">
                <!-- Main node for this component -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="timeline">
                            <!-- Timeline time label -->
                            <div class="time-label">
                                <button class="btn btn-lg btn-danger mx-2">Start</button>
                            </div>
                            @foreach ($kategoriJadwal1 as $item)
                                <div>
                                    <i class="fas fa-check bg-blue"></i>
                                    <!-- Timeline item -->
                                    <div class="timeline-item">

                                        @php
                                            $waktu = $jadwal->where('kategori', $loop->iteration)->first();
                                        @endphp

                                        @if ($waktu)
                                            <b
                                                class="m-2">{{ Illuminate\Support\Carbon::parse($waktu->waktu)->isoFormat('dddd, D MMMM Y', 'id') }}</b>
                                        @else
                                            <b style="color: red" class="m-2">Harap Isi</b>
                                        @endif
                                        <button class="badge badge-sm badge-info" data-toggle="modal"
                                            data-target="#editJadwal{{ $item->id }}"> <i
                                                class="fas fa-pen"></i></button>

                                        <br>
                                        <span class="m-2">{{ $item->nama }}</span>

                                    </div>
                                </div>
                            @endforeach


                            <div class="time-label">
                                <button class="btn btn-lg btn-info mx-2">2</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="timeline">
                            <!-- Timeline time label -->
                            <div class="time-label">
                                <button class="btn btn-lg btn-info mx-2">2</button>
                            </div>
                            @foreach ($kategoriJadwal2 as $item)
                                <div>
                                    <i class="fas fa-check bg-blue"></i>
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        @php
                                            $waktu = $jadwal->where('kategori', 6 + $loop->iteration)->first();
                                        @endphp

                                        @if ($waktu)
                                            <b
                                                class="m-2">{{ Illuminate\Support\Carbon::parse($waktu->waktu)->isoFormat('dddd, D MMMM Y', 'id') }}</b>
                                        @else
                                            <b style="color: red" class="m-2">Harap Isi</b>
                                        @endif
                                        <button class="badge badge-sm badge-info" data-toggle="modal"
                                            data-target="#editJadwal{{ $item->id }}"> <i
                                                class="fas fa-pen"></i></button>
                                        <br>
                                        <span class="m-2">{{ $item->nama }}

                                    </div>
                                </div>
                            @endforeach
                            <div class="time-label">
                                <button class="btn btn-lg btn-warning mx-2">3</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="timeline">
                            <!-- Timeline time label -->
                            <div class="time-label">
                                <button class="btn btn-lg btn-warning mx-2">3</button>
                            </div>
                            @foreach ($kategoriJadwal3 as $item)
                                <div>
                                    <i class="fas fa-check bg-blue"></i>
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        @php
                                            $waktu = $jadwal->where('kategori', 12 + $loop->iteration)->first();
                                        @endphp

                                        @if ($waktu)
                                            <b
                                                class="m-2">{{ Illuminate\Support\Carbon::parse($waktu->waktu)->isoFormat('dddd, D MMMM Y', 'id') }}</b>
                                        @else
                                            <b style="color: red" class="m-2">Harap Isi</b>
                                        @endif
                                        <button class="badge badge-sm badge-info" data-toggle="modal"
                                            data-target="#editJadwal{{ $item->id }}"> <i
                                                class="fas fa-pen"></i></button>
                                        <br>
                                        <span class="m-2">{{ $item->nama }}

                                    </div>
                                </div>
                            @endforeach
                            <div class="time-label">
                                <button class="btn btn-lg btn-danger mx-2">End</button>
                            </div>

                        </div>
                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /.col -->


    {{-- Modal Edit --}}

    {{-- Edit Kontrak Kerja --}}
    <div class="modal fade" id="editKontrak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kontrak</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/kontrak/{{ $kontrak->id }}">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pekerjaan">Nama Paket Pekerjaan</label>
                            <textarea class="form-control @error('pekerjaan') is-invalid  @enderror" rows="2" name="pekerjaan">{{ old('pekerjaan', $kontrak->pekerjaan) }}  </textarea>
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">

                            <label>Waktu Pekerjaan </label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="waktu" class="form-control float-right" id="reservation"
                                    data-start="{{ date('m/d/Y', strtotime($kontrak->waktu_mulai)) }}"
                                    data-end="{{ date('m/d/Y', strtotime($kontrak->waktu_selesai)) }}">
                            </div>
                            <!-- /.input group -->
                        </div> --}}
                        <div class="form-group">
                            <label for="no_tunjuk">Nomor Petunjuk</label>
                            <input type="text" value="{{ old('no_tunjuk', $kontrak->no_tunjuk) }}"
                                class="form-control @error('no_tunjuk') is-invalid  @enderror" name="no_tunjuk"
                                placeholder="Contoh : 035/VII/2023">
                            </input>
                            @error('no_tunjuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formulir_permintaan">Nomor Formulir Permintaan</label>
                            <input type="text" value="{{ old('formulir_permintaan', $kontrak->formulir_permintaan) }}"
                                class="form-control @error('formulir_permintaan') is-invalid  @enderror"
                                name="formulir_permintaan" placeholder="Contoh : B-081/32520/VS.220/07/2003">
                            </input>
                            @error('formulir_permintaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kode_mak">Kode Kegiatan/Sub Kegiatan/MAK</label>
                            <input type="text" value="{{ old('kode_mak', $kontrak->kode_mak) }}"
                                class="form-control @error('kode_mak') is-invalid  @enderror" name="kode_mak"
                                placeholder="Contoh : 054.01.GG.2907.BMA.006.051.A.521211">
                            </input>
                            @error('kode_mak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="@error('jenis_id') text-danger  @enderror" for="jenis_id">Jenis
                                        Kontrak</label>
                                    @error('jenis_id')
                                        <small class="badge badge-danger"> *{{ $message }}
                                        </small>
                                    @enderror
                                    <select class="form-control select2bs4" name="jenis_id">
                                        <option value="">Pilih Salah Satu </option>
                                        @foreach ($jenis as $item)
                                            @if (old('jenis_id', $kontrak->jenis_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->jenis }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="@error('denda_id') text-danger  @enderror" for="denda_id">Denda
                                        Keterlambatan</label>
                                    @error('denda_id')
                                        <small class="badge badge-danger"> *{{ $message }}
                                        </small>
                                    @enderror
                                    <select class="form-control select2bs4" name="denda_id">
                                        <option value="">Pilih Salah Satu </option>
                                        @foreach ($denda as $item)
                                            @if (old('denda_id', $kontrak->denda_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->denda }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->denda }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pagu_anggaran">Pagu Anggaran</label>
                                    <input type="number" value="{{ old('pagu_anggaran', $kontrak->pagu_anggaran) }}"
                                        class="form-control @error('pagu_anggaran') is-invalid  @enderror"
                                        name="pagu_anggaran">
                                    </input>
                                    @error('pagu_anggaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_dipa">Tanggal DIPA</label>
                                    <input type="date" value="{{ old('tanggal_dipa', $kontrak->tanggal_dipa) }}"
                                        class="form-control @error('tanggal_dipa') is-invalid  @enderror"
                                        name="tanggal_dipa" placeholder="Daftar Isian Pelaksanaan Anggaran(DIPA)">
                                    </input>
                                    @error('tanggal_dipa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="buttonKontrak" value="kontrak" class="btn btn-primary">Edit
                            Kontrak</button>

                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit Vendor --}}
    <div class="modal fade" id="editVendor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Vendor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/kontrak/{{ $kontrak->id }}" onsubmit="saveScrollPosition()">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="penyedia_jasa">Nama Vendor</label>
                            <input type="text" value="{{ old('penyedia_jasa', $kontrak->vendor->penyedia_jasa) }}"
                                class="form-control @error('penyedia_jasa') is-invalid  @enderror" name="penyedia_jasa">
                            </input>
                            @error('penyedia_jasa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_pejabat">Nama Pejabat</label>
                                    <input type="text"
                                        value="{{ old('nama_pejabat', $kontrak->vendor->nama_pejabat) }}"
                                        class="form-control @error('nama_pejabat') is-invalid  @enderror"
                                        name="nama_pejabat">
                                    </input>
                                    @error('nama_pejabat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" value="{{ old('jabatan', $kontrak->vendor->jabatan) }}"
                                        class="form-control @error('jabatan') is-invalid  @enderror" name="jabatan">
                                    </input>
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="alamat_perusahaan">Alamat Vendor</label>
                            <textarea class="form-control @error('alamat_perusahaan') is-invalid  @enderror" rows="2"
                                name="alamat_perusahaan">{{ old('alamat_perusahaan', $kontrak->vendor->alamat_perusahaan) }}  </textarea>
                            @error('alamat_perusahaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="npwp">Nomor Pokok Wajib Pajak</label>
                                    <input type="text" value="{{ old('npwp', $kontrak->vendor->npwp) }}"
                                        class="form-control @error('npwp') is-invalid  @enderror" name="npwp">
                                    </input>
                                    @error('npwp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="@error('bank_id') text-danger  @enderror" for="bank_id">Bank</label>
                                    @error('bank_id')
                                        <small class="badge badge-danger"> *{{ $message }}
                                        </small>
                                    @enderror
                                    <select class="form-control select2bs4" name="bank_id">
                                        <option value="">Pilih Salah Satu </option>
                                        @foreach ($bank as $item)
                                            @if (old('bank_id', $kontrak->vendor->bank_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nama_bank }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nama_bank }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_rekening">Nama Rekening</label>
                                    <input type="text"
                                        value="{{ old('nama_rekening', $kontrak->vendor->nama_rekening) }}"
                                        class="form-control @error('nama_rekening') is-invalid  @enderror"
                                        name="nama_rekening">
                                    </input>
                                    @error('nama_rekening')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_rekening">Nomor Rekening</label>
                                    <input type="number" value="{{ old('no_rekening', $kontrak->vendor->no_rekening) }}"
                                        class="form-control @error('no_rekening') is-invalid  @enderror"
                                        name="no_rekening">
                                    </input>
                                    @error('no_rekening')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="buttonVendor" value="vendor" class="btn btn-primary">Edit
                            Vendor</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit Penanggung Jawab --}}
    <div class="modal fade" id="editPenanggungJawab">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Penanggung Jawab</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/kontrak/{{ $kontrak->id }}" onsubmit="saveScrollPosition()">
                    @method('put')
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="@error('pbj') text-danger  @enderror" for="pbj">Pejabat Pengadaan
                                Barang/Jasa</label>
                            @error('pbj')
                                <small class="badge badge-danger"> *{{ $message }}
                                </small>
                            @enderror
                            <select class="form-control select2bs4" name="pbj">
                                <option value="">Pilih Salah Satu </option>
                                @foreach ($pbj as $item)
                                    @if (old('pbj', $kontrak->pbj) == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="@error('ppk') text-danger  @enderror" for="ppk">Pejabat Pembuat
                                Komitmen</label>
                            @error('ppk')
                                <small class="badge badge-danger"> *{{ $message }}
                                </small>
                            @enderror
                            <select class="form-control select2bs4" name="ppk">
                                <option value="">Pilih Salah Satu </option>
                                @foreach ($ppk as $item)
                                    @if (old('ppk', $kontrak->ppk) == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="buttonPenanggungJawab" value="asn" class="btn btn-primary">Edit
                            Penanggung Jawab</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    {{-- Tambah Barang --}}
    <div class="modal fade" id="tambahBarang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/barang" onsubmit="saveScrollPosition()">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="kontrak_id" value="{{ $kontrak->id }}">
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" value="{{ old('nama') }}"
                                class="form-control @error('nama') is-invalid  @enderror" name="nama">
                            </input>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <textarea class="form-control @error('spesifikasi') is-invalid  @enderror" rows="2" name="spesifikasi">{{ old('spesifikasi') }} </textarea>
                            @error('spesifikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="number" value="{{ old('volume') }}"
                                        class="form-control @error('volume') is-invalid  @enderror" name="volume">
                                    </input>
                                    @error('volume')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="@error('satuan') text-danger  @enderror" for="satuan">Satuan</label>
                                    @error('satuan')
                                        <small class="badge badge-danger"> *{{ $message }}
                                        </small>
                                    @enderror
                                    <select class="form-control select2bs4" name="satuan">
                                        <option value="">Pilih Salah Satu </option>
                                        <option value="Buah">Buah</option>
                                        {{-- <option value="xxx">xxx</option>
                                        <option value="ccc">ccc</option> --}}

                                    </select>
                                </div>

                            </div>

                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="harga_hps">Harga Perkiraan Sendiri (HPS)</label>
                            <input type="number" value="{{ old('harga_hps') }}"
                                class="form-control @error('harga_hps') is-invalid  @enderror" name="harga_hps">
                            </input>
                            @error('harga_hps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="harga_tawar">Harga Penawaran</label>
                                    <input type="number" value="{{ old('harga_tawar') }}"
                                        class="form-control @error('harga_tawar') is-invalid  @enderror"
                                        name="harga_tawar">
                                    </input>
                                    @error('harga_tawar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="harga_nego">Harga Negosiasi</label>
                                    <input type="number" value="{{ old('harga_nego') }}"
                                        class="form-control @error('harga_nego') is-invalid  @enderror"
                                        name="harga_nego">
                                    </input>
                                    @error('harga_nego')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Barang
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit Barang --}}
    @foreach ($barang as $value)
        <div class="modal fade" id="editBarang{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/barang/{{ $value->id }}" onsubmit="saveScrollPosition()">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" value="{{ old('nama', $value->nama) }}"
                                    class="form-control @error('nama') is-invalid  @enderror" name="nama">
                                </input>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="spesifikasi">Spesifikasi</label>
                                <textarea class="form-control @error('spesifikasi') is-invalid  @enderror" rows="2" name="spesifikasi">{{ old('spesifikasi', $value->spesifikasi) }} </textarea>
                                @error('spesifikasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="volume">Volume</label>
                                        <input type="number" value="{{ old('volume', $value->volume) }}"
                                            class="form-control @error('volume') is-invalid  @enderror" name="volume">
                                        </input>
                                        @error('volume')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="@error('satuan') text-danger  @enderror"
                                            for="satuan">Satuan</label>
                                        @error('satuan')
                                            <small class="badge badge-danger"> *{{ $message }}
                                            </small>
                                        @enderror
                                        <select class="form-control select2bs4" name="satuan">
                                            <option value="{{ $value->satuan }}">{{ $value->satuan }}</option>
                                            <option value="Buah">Buah</option>
                                            <option value="xxx">xxx</option>
                                            <option value="ccc">ccc</option>

                                        </select>
                                    </div>

                                </div>

                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="harga_hps">Harga Perkiraan Sendiri (HPS)</label>
                                <input type="number" value="{{ old('harga_hps', $value->harga_hps) }}"
                                    class="form-control @error('harga_hps') is-invalid  @enderror" name="harga_hps">
                                </input>
                                @error('harga_hps')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="harga_tawar">Harga Penawaran</label>
                                        <input type="number" value="{{ old('harga_tawar', $value->harga_tawar) }}"
                                            class="form-control @error('harga_tawar') is-invalid  @enderror"
                                            name="harga_tawar">
                                        </input>
                                        @error('harga_tawar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="harga_nego">Harga Negosiasi</label>
                                        <input type="number" value="{{ old('harga_nego', $value->harga_nego) }}"
                                            class="form-control @error('harga_nego') is-invalid  @enderror"
                                            name="harga_nego">
                                        </input>
                                        @error('harga_nego')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Barang
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

    {{-- Hapus Barang --}}
    @foreach ($barang as $value)
        <div class="modal fade" id="hapusBarang{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/barang/{{ $value->id }}" method="post" onsubmit="saveScrollPosition()">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <p class="text-center">Apakah kamu yakin untuk menghapus data Barang/Jasa
                                <b>{{ $value->nama }}</b>
                            </p>
                        </div>
                        <div class="modal-footer justify-content-between">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

    {{-- Edit Jadwal  --}}
    @foreach ($kategoriJadwal as $value)
        <div class="modal fade" id="editJadwal{{ $value->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/jadwal" onsubmit="saveScrollPosition()">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                @php
                                    $waktu = $jadwal->where('kategori', $value->id)->first();
                                    $waktuSebelumnya = $jadwal
                                        ->where('kategori', '<', $value->id)
                                        ->sortByDesc('kategori')
                                        ->first();
                                    
                                    $waktuSetelahnya = $jadwal
                                        ->where('kategori', '>', $value->id)
                                        ->sortBy('kategori')
                                        ->first();
                                @endphp
                                <label>Jadwal {{ $value->nama }}</label>
                                @if ($waktu)
                                    {{-- Jika sudah ada didatabase --}}
                                    @if ($waktuSebelumnya && $waktuSetelahnya)
                                        <input type="date" class="form-control" name="date"
                                            value="{{ date('Y-m-d', strtotime($waktu->waktu)) }}"
                                            min="{{ date('Y-m-d', strtotime($waktuSebelumnya->waktu)) }}"
                                            max="{{ date('Y-m-d', strtotime($waktuSetelahnya->waktu)) }}" />
                                    @elseif($waktuSebelumnya && !$waktuSetelahnya)
                                        <input type="date" class="form-control" name="date"
                                            value="{{ date('Y-m-d', strtotime($waktu->waktu)) }}"
                                            min="{{ date('Y-m-d', strtotime($waktuSebelumnya->waktu)) }}"
                                            max="" />
                                    @elseif(!$waktuSebelumnya && $waktuSetelahnya)
                                        <input type="date" class="form-control" name="date"
                                            value="{{ date('Y-m-d', strtotime($waktu->waktu)) }}" min=""
                                            max="{{ date('Y-m-d', strtotime($waktuSetelahnya->waktu)) }}" />
                                    @endif
                                @else
                                    {{-- Jika belum ada didatabase --}}
                                    @if ($waktuSebelumnya && $waktuSetelahnya)
                                        <input type="date" class="form-control" name="date"
                                            min="{{ date('Y-m-d', strtotime($waktuSebelumnya->waktu)) }}"
                                            max="{{ date('Y-m-d', strtotime($waktuSetelahnya->waktu)) }}" />
                                    @elseif($waktuSebelumnya && !$waktuSetelahnya)
                                        <input type="date" class="form-control" name="date"
                                            min="{{ date('Y-m-d', strtotime($waktuSebelumnya->waktu)) }}"
                                            max="" />
                                    @elseif(!$waktuSebelumnya && $waktuSetelahnya)
                                        <input type="date" class="form-control" name="date" min=""
                                            max="{{ date('Y-m-d', strtotime($waktuSetelahnya->waktu)) }}" />
                                    @endif
                                @endif

                                <input type="hidden" value="{{ $kontrak->id }}" name="kontrak_id">
                                <input type="hidden" value="{{ $value->id }}" name="kategori">
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Jadwal
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach


    {{-- Edit Jadwal contoh --}}
    {{-- @foreach ($jadwal as $value)
        <div class="modal fade" id="editJadwal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/jadwal">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($kategoriJadwal as $value)
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ $value->nama }}</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                @php
                                                    $waktu = $jadwal->where('kategori', $loop->iteration)->first();
                                                @endphp

                                                @if ($waktu)
                                                    <input type="text" name="date{{ $value->id }}"
                                                        value="{{ date('m/d/Y', strtotime($waktu->waktu)) }}"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#reservationdate" />
                                                @else
                                                    <input type="text" name="date{{ $value->id }}"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#reservationdate" />
                                                @endif

                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Jadwal
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach --}}







    <script script src="{{ asset('template') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        var Toast = Swal.mixin({
            // toast: true,
            // position: 'top-end',
            // showConfirmButton: false,
            timer: 10000, // waktu dalam milidetik
            timerProgressBar: true,
        });
    </script>

    @if ($errors->any())
        <script>
            Toast.fire({
                icon: 'error',
                title: "{{ __('Error in form request!') }}",
                text: "{{ implode(' , ', $errors->all()) }}",
                type: "error"
            });
        </script>
        <br>
    @endif
    <br>
    @if (Session::has('success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('success') }}"
            })
        </script>
    @endif
@endsection
