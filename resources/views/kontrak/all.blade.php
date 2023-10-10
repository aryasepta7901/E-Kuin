@extends('layouts.backEnd.main')

@section('content')
    <div class="col-lg-12">


        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <b>BPS {{ auth()->user()->satker->nama_satker }}</b>


            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive-md">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">BPS</th>
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
                                <td>{{ $item->satker->nama_satker }}</td>
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
