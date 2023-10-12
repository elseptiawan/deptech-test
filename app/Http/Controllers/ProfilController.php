<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function edit(){
        $data = Admin::find(auth()->user()->id);
        return view('Pages.Profil.EditProfil', compact('data'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Admin::find(auth()->user()->id);
        $data->nama_depan = $request->nama_depan;
        $data->nama_belakang = $request->nama_belakang;
        $data->email = $request->email;
        $data->save();

        return redirect('/profil')->with('success', 'Success Update Profil');
    }

    public function updatepassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password_lama' => 'required|string',
            'password_baru' => 'required|string|same:konfirmasi_password',
            'konfirmasi_password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Admin::find(auth()->user()->id);
        if (! Hash::check($request->password_lama, $data->password)) {
            return redirect()->back()->with('error', 'Password Lama Salah');
        }

        $data->password = Hash::make($request->password_baru);
        $data->save();

        return redirect('/profil')->with('success', 'Success Update Password');
    }
}
