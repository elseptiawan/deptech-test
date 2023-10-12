@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Edit Data Admin</h2>
        <form class="form-floating" method="POST" action="/admin/update/{{ $admin->id }}">
            @csrf
            <div class="form-group">
                {{-- <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}"> --}}
                <label for="nama_depan">Nama Depan <span style="color: red">*</span></label>
                <input type="text" name="nama_depan" id="nama_depan" class="form-control mb-2"
                    value="{{ $admin->nama_depan }}">
                @error('nama_depan')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="nama_belakang">Nama Belakang <span style="color: red">*</span></label>
                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control mb-2"
                    value="{{ $admin->nama_belakang }}">
                @error('nama_belakang')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">Email <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2" value="{{ $admin->email }}">
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                {{-- <button class="btn btn-success" onClick="event.preventDefault();store()">Simpan</button> --}}
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
