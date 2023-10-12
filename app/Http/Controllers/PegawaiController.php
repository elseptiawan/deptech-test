<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = Pegawai::all();
        return view('Pages.Pegawai.ListPegawai', compact('pegawai'));
    }

    public function create(){
        return view('Pages.Pegawai.CreatePegawai');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pegawai = new Pegawai;
        $pegawai->nama_depan = $request->nama_depan;
        $pegawai->nama_belakang = $request->nama_belakang;
        $pegawai->email = $request->email;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->alamat = $request->alamat;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Success Create Pegawai');
    }

    public function edit($id){
        $pegawai = Pegawai::find($id);
        return view('Pages.Pegawai.EditPegawai', compact('pegawai'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pegawai = Pegawai::find($id);
        $pegawai->nama_depan = $request->nama_depan;
        $pegawai->nama_belakang = $request->nama_belakang;
        $pegawai->email = $request->email;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->alamat = $request->alamat;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Success Edit Pegawai');
    }

    public function destroy($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return redirect('/pegawai')->with('success', 'Success Delete Pegawai');
    }

    public function cutipegawai(){
        $pegawai = Pegawai::with('cuti')->get();
        return view('Pages.CutiPegawai.ListCutiPegawai', compact('pegawai'));
    }
}
