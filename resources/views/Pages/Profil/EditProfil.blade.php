@extends('Layout.main')
@section('content')
    <div class="p2 mb-5 mx-auto" style="width:50%">
        <h2>Form Edit Profil Admin</h2>
        @if (session()->has('success'))
            <div class="error mb-3 bg-success text-light p-2 rounded">{{ session('success') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/profil/update">
            @csrf
            <div class="form-group">
                {{-- <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}"> --}}
                <label for="nama_depan">Nama Depan <span style="color: red">*</span></label>
                <input type="text" name="nama_depan" id="nama_depan" class="form-control mb-2"
                    value="{{ $data->nama_depan }}">
                @error('nama_depan')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="nama_belakang">Nama Belakang <span style="color: red">*</span></label>
                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control mb-2"
                    value="{{ $data->nama_belakang }}">
                @error('nama_belakang')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">Email <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2" value="{{ $data->email }}">
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>

    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Edit Password</h2>
        @if (session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/profil/updatepassword">
            @csrf
            <div class="form-group">
                <label for="password_lama">Password Lama <span style="color: red">*</span></label>
                <input type="password" name="password_lama" id="password_lama" class="form-control mb-2">
                @error('password_lama')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="password_baru">Password Baru <span style="color: red">*</span></label>
                <input type="password" name="password_baru" id="password_baru" class="form-control mb-2">
                @error('password_baru')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="konfirmasi_password">Konfirmasi Password <span style="color: red">*</span></label>
                <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control mb-2">
                @error('konfirmasi_password')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
