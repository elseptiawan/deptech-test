@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">List Cuti Pegawai</h1>
        </div>
        <div class="row" id="read"></div>
    </div>
    <div class="col-12">
        @if (session()->has('success'))
            <div class="error mb-3 bg-success text-light p-2 rounded">{{ session('success') }}</div>
        @endif
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alasan Cuti</th>
                    <th scope="col">Tanggal Mulai Cuti</th>
                    <th scope="col">Tanggal Selesai Cuti</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pegawai as $item)
                    @foreach($item->cuti as $cuti)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                        <td>{{ $cuti->alasan }}</td>
                        <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
