@extends('layouts.backEnd.main')

@section('content')
    <div class="col-lg-12">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Ada Kesalahan</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
                <small class="badge badge-info"> <i class="icon fas fa-info"></i> Note : Silahkan Buka Kembali Pop Up untuk
                    melakukan perubahan pada isian yang
                    salah</small>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <b>BPS {{ auth()->user()->satker->nama_satker }}</b>

                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus">
                    </i> Tambah
                    Data</button>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive-md">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Paket Pekerjaan</th>
                            <th rowspan="2">Nama Penyedia</th>
                            {{-- <th>Nomor Kontrak </th>
                            <th>Tanggal Kontrak</th> --}}
                            <th class="text-center" colspan="2">Waktu Pekerjaan</th>

                            {{-- <th>Kode MAK</th> --}}
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Mulai</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kontrak as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->vendor->penyedia_jasa }}</td>

                                @php
                                    $mulai = Illuminate\Support\Carbon::parse($item->waktu_mulai)->isoFormat('dddd, D MMMM Y', 'id');
                                    $selesai = Illuminate\Support\Carbon::parse($item->waktu_selesai)->isoFormat('dddd, D MMMM Y', 'id');
                                @endphp
                                <td>{{ $mulai }} </td>
                                <td>{{ $selesai }}</td>

                                <td class="text-center">
                                    <a href="/kontrak/{{ $item->id }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-eye"></i></a>

                                    <button class="btn btn-sm btn-danger ml-auto" data-toggle="modal"
                                        data-target="#hapus{{ $item->id }}"><i class="fa fa-trash">
                                        </i></button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    {{-- Modal --}}
    {{-- Tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kontrak</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/kontrak">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pekerjaan">Nama Paket Pekerjaan</label>
                            <textarea class="form-control @error('pekerjaan') is-invalid  @enderror" rows="2" name="pekerjaan">{{ old('pekerjaan') }} </textarea>
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="penyedia_jasa">Nama Penyedia</label>
                            <input type="penyedia_jasa" class="form-control @error('penyedia_jasa') is-invalid  @enderror"
                                id="penyedia_jasa" name="penyedia_jasa" value="{{ old('penyedia_jasa') }}">
                            @error('penyedia_jasa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Waktu Pekerjaan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>

                                <input type="text" name="waktu" class="form-control float-right" id="reservation">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="@error('pbj') text-danger  @enderror" for="pbj">PBJ</label>
                                    @error('pbj')
                                        <small class="badge badge-danger"> *{{ $message }}
                                        </small>
                                    @enderror
                                    <select class="form-control select2bs4" name="pbj">
                                        <option value="">Pilih Salah Satu </option>
                                        @foreach ($pbj as $item)
                                            @if (old('pbj') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="@error('ppk') text-danger  @enderror" for="ppk">PPK</label>
                                    @error('ppk')
                                        <small class="badge badge-danger"> *{{ $message }}
                                        </small>
                                    @enderror
                                    <select class="form-control select2bs4" name="ppk">
                                        <option value="">Pilih Salah Satu </option>
                                        @foreach ($ppk as $item)
                                            @if (old('ppk') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Buat Kontrak</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Hapus  --}}
    @foreach ($kontrak as $value)
        <div class="modal fade" id="hapus{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Kontrak</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/kontrak/{{ $value->id }}" method="post" onsubmit="saveScrollPosition()">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <p class="text-center">Apakah kamu yakin untuk menghapus data Kontrak :
                                <b>{{ $value->pekerjaan }}</b>
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
@endsection
