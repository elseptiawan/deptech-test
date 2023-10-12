@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Create Cuti</h2>
        @if (session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/cuti/store">
            @csrf
            <div class="form-group">
                <label for="pegawai_id">Nama Depan <span style="color: red">*</span></label>
                <select name="pegawai_id" id="pegawai_id" class="form-select form-select-sm p-2 mb-2">
                    <option selected disabled hidden>Pilih Nama Pegawai</option>
                    @foreach ($pegawai as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_depan }} {{ $item->nama_belakang }}</option>
                    @endforeach
                </select>
                @error('pegawai_id')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="alasan">Alasan Cuti <span style="color: red">*</span></label>
                <input type="text" name="alasan" id="alasan" class="form-control mb-2">
                @error('alasan')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="tanggal_mulai">Tanggal Mulai Cuti (YYYY-MM-DD) <span style="color: red">*</span></label>
                <input type="tanggal_mulai" name="tanggal_mulai" id="tanggal_mulai" class="form-control mb-2">
                @error('tanggal_mulai')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="tanggal_selesai">Tanggal Selesai Cuti (YYYY-MM-DD) <span style="color: red">*</span></label>
                <input type="tanggal_selesai" name="tanggal_selesai" id="tanggal_selesai" class="form-control mb-2">
                @error('tanggal_selesai')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
