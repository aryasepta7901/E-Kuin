@extends('layouts.backEnd.main')

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <label for="">Kuasa Pengguna Anggaran</label>
                        <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#editKPA"><i
                                class="fa fa-pen">
                            </i></button>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8">{{ $kpa->name }}</dd>
                            <dt class="col-sm-4">NIP</dt>
                            <dd class="col-sm-8">
                                {{ $kpa->id }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <label for="">Bendahara Pengeluaran</label>

                        <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#editBP"><i
                                class="fa fa-pen">
                            </i></button>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8">{{ $bp->name }}</dd>
                            <dt class="col-sm-4">NIP</dt>
                            <dd class="col-sm-8">
                                {{ $bp->id }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

        </div>
        {{-- PBJ --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <b>Pejabat Pengadaan Barang/Jasa (PBJ)</b>
                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tambahpbj"><i class="fa fa-plus">
                    </i> Tambah
                    Data</button>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>NIP</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($pbj as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->id }}</td>
                                <td> <button class="btn btn-sm btn-info ml-auto" data-toggle="modal"
                                        data-target="#editpbj{{ $value->id }}"><i class="fa fa-pen">
                                        </i></button>
                                    <button class="btn btn-sm btn-danger ml-auto" data-toggle="modal"
                                        data-target="#hapuspbj{{ $value->id }}"><i class="fa fa-trash">
                                        </i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.PPK -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <b>Pejabat Pembuat Komitmen</b>
                {{-- <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tambahppk"><i class="fa fa-plus">
                    </i> Tambah
                    Data</button> --}}
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>NIP</th>
                            <th>Program</th>
                            <th>Surat Tugas</th>
                            <th class="text-center">Tanggal Surat Tugas</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($ppk as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->userPPK->program }}</td>
                                <td>{{ $value->userPPK->no_surat_tugas }}</td>
                                <td> {{ Illuminate\Support\Carbon::parse($value->userPPK->tanggal_surat_tugas)->isoFormat('dddd, D MMMM Y', 'id') }}
                                </td>

                                <td class="text-center"> <button class="btn btn-sm btn-info ml-auto" data-toggle="modal"
                                        data-target="#editPPK{{ $value->id }}"><i class="fa fa-pen">
                                        </i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    {{-- Modal --}}

    {{-- PBJ --}}
    {{-- Tambah  --}}
    <div class="modal fade" id="tambahpbj">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pejabat Pengadaan Barang/Jasa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/users" onsubmit="saveScrollPosition()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">Nomor Induk Penduduk</label>
                            <input type="number" class="form-control @error('nip') is-invalid  @enderror" id="nip"
                                name="nip" value="{{ old('nip') }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="buttonPBJ" value="pbj" class="btn btn-primary">Buat PBJ</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit --}}
    @foreach ($pbj as $value)
        <div class="modal fade" id="editpbj{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Pejabat Pengadaan Barang/Jasa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/users/{{ $value->id }}" onsubmit="saveScrollPosition()">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid  @enderror"
                                    id="nama" name="nama" value="{{ old('nama', $value->name) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nip">Nomor Induk Penduduk</label>
                                <input type="number" class="form-control @error('nip') is-invalid  @enderror"
                                    id="nip" name="nip" value="{{ old('nip', $value->id) }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="buttonUser" value="PBJ" class="btn btn-primary">Edit
                                PBJ</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

    {{-- Hapus --}}
    @foreach ($pbj as $value)
        <div class="modal fade" id="hapuspbj{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus User PBJ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/users/{{ $value->id }}" method="post" onsubmit="saveScrollPosition()">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <p>Apakah kamu yakin untuk menghapus Nama
                                <b>{{ $value->name }} </b>
                                dari daftar Pejabat Pengadaan Barang/Jasa
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

    {{-- Edit KPA --}}
    <div class="modal fade" id="editKPA">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kuasa Pengguna Anggaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/users/{{ $kpa->id }}" onsubmit="saveScrollPosition()">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror"
                                id="nama" name="nama" value="{{ old('nama', $kpa->name) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">Nomor Induk Penduduk</label>
                            <input type="number" class="form-control @error('nip') is-invalid  @enderror" id="nip"
                                name="nip" value="{{ old('nip', $kpa->id) }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="buttonUser" value="KPA" class="btn btn-primary">Edit
                            KPA</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit BP --}}
    <div class="modal fade" id="editBP">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Bendahara Pengeluaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/users/{{ $bp->id }}" onsubmit="saveScrollPosition()">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror"
                                id="nama" name="nama" value="{{ old('nama', $bp->name) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">Nomor Induk Penduduk</label>
                            <input type="number" class="form-control @error('nip') is-invalid  @enderror" id="nip"
                                name="nip" value="{{ old('nip', $bp->id) }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="buttonUser" value="BP" class="btn btn-primary">Edit BP</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit PPK --}}
    @foreach ($ppk as $value)
        <div class="modal fade" id="editPPK{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Pejabat Pembuat Komitmen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/users/{{ $value->id }}" onsubmit="saveScrollPosition()">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid  @enderror"
                                    id="nama" name="nama" value="{{ old('nama', $value->name) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nip">Nomor Induk Penduduk</label>
                                <input type="number" class="form-control @error('nip') is-invalid  @enderror"
                                    id="nip" name="nip" value="{{ old('nip', $value->id) }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="program">Program</label>
                                <input type="text" readonly class="form-control " id="program" name="program"
                                    value="{{ $value->userPPK->program }}">

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="no_surat_tugas">No Surat Tugas</label>
                                        <input type="text"
                                            value="{{ old('no_surat_tugas', $value->userPPK->no_surat_tugas) }}"
                                            class="form-control @error('no_surat_tugas') is-invalid  @enderror"
                                            name="no_surat_tugas">
                                        </input>
                                        @error('no_surat_tugas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tanggal_surat_tugas">Tanggal Surat Tugas</label>
                                        <input type="date"
                                            value="{{ old('tanggal_surat_tugas', $value->userPPK->tanggal_surat_tugas) }}"
                                            class="form-control @error('tanggal_surat_tugas') is-invalid  @enderror"
                                            name="tanggal_surat_tugas">
                                        </input>
                                        @error('tanggal_surat_tugas')
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
                            <button type="submit" name="buttonPPK" value="PPK" class="btn btn-primary">Edit
                                PPK</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach




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
