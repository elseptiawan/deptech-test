@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">List Data Cuti</h1>
            <button class="btn btn-outline-primary" onclick="location.href='{{ url('cuti/create') }}'">
                <i class="bi bi-file-earmark-plus"></i> Tambah Data</button>
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
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($cuti as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->pegawai->nama_depan }} {{ $item->pegawai->nama_belakang }}</td>
                        <td>{{ $item->alasan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                        <td><a href="/cuti/edit/{{ $item->id }}"><i class="bi bi-pencil-square"
                                    style="margin-right: 5px; color: green;"></i></a>
                            <a href="/cuti/delete/{{ $item->id }}"><i class="bi bi-x-square-fill" style="color: #f43737;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
