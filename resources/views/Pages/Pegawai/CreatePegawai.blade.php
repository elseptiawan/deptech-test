@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Create Pegawai</h2>
        <form class="form-floating" method="POST" action="/pegawai/store">
            @csrf
            <div class="form-group">
                <label for="nama_depan">Nama Depan <span style="color: red">*</span></label>
                <input type="text" name="nama_depan" id="nama_depan" class="form-control mb-2">
                @error('nama_depan')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="nama_belakang">Nama Belakang <span style="color: red">*</span></label>
                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control mb-2">
                @error('nama_belakang')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">Email <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2">
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="no_hp">No HP <span style="color: red">*</span></label>
                <input type="text" name="no_hp" id="no_hp" class="form-control mb-2">
                @error('no_hp')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="alamat">Alamat <span style="color: red">*</span></label>
                <input type="text" name="alamat" id="alamat" class="form-control mb-2">
                @error('alamat')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="jenis_kelamin">jenis Kelamin <span style="color: red">*</span></label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-sm p-2 mb-2">
                    <option selected disabled hidden>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
