<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cuti, Pegawai};
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function index(){
        $cuti = Cuti::all();
        return view('Pages.Cuti.ListCuti', compact('cuti'));
    }

    public function create(){
        $pegawai = Pegawai::all();
        return view('Pages.Cuti.CreateCuti', compact('pegawai'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required|integer',
            'tanggal_mulai' => 'required|date|date_format:Y-m-d|after:today',
            'tanggal_selesai' => 'required|date|date_format:Y-m-d|after:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $start_date = Carbon::parse($request->tanggal_mulai);
        $end_date = Carbon::parse($request->tanggal_selesai);
        $diff = $start_date->diffInDays($end_date)+1;

        $getCutiPegawai = Cuti::where('pegawai_id', $request->pegawai_id)->whereYear('created_at', Carbon::today()->year)->get();
        $totalCuti = 0;
        foreach ($getCutiPegawai as $value) {
            $start_date = Carbon::parse($value->tanggal_mulai);
            $end_date = Carbon::parse($value->tanggal_selesai);
            $diff = $start_date->diffInDays($end_date)+1;
            $totalCuti += $diff;
        }

        if($totalCuti + $diff > 5){
            return redirect()->back()->with('error', 'Jumlah Cuti Melebihi 5 Hari')->withInput();
        }

        $cuti = new Cuti;
        $cuti->pegawai_id = $request->pegawai_id;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan = $request->alasan;
        $cuti->save();

        return redirect('/cuti')->with('success', 'Success Create Cuti');
    }

    public function edit($id){
        $cuti = Cuti::find($id);
        $pegawai = Pegawai::all();
        return view('Pages.Cuti.EditCuti', compact('cuti', 'pegawai'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required|integer',
            'tanggal_mulai' => 'required|date|date_format:Y-m-d|after:today',
            'tanggal_selesai' => 'required|date|date_format:Y-m-d|after:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $start_date = Carbon::parse($request->tanggal_mulai);
        $end_date = Carbon::parse($request->tanggal_selesai);
        $diff = $start_date->diffInDays($end_date)+1;

        $getCutiPegawai = Cuti::where('pegawai_id', $request->pegawai_id)->whereYear('created_at', date('y'))->get();
        $totalCuti = 0;
        foreach ($getCutiPegawai as $value) {
            $start_date = Carbon::parse($value->tanggal_mulai);
            $end_date = Carbon::parse($value->tanggal_selesai);
            $diff = $start_date->diffInDays($end_date)+1;
            $totalCuti += $diff;
        }

        if($totalCuti + $diff > 5){
            return redirect()->back()->with('error', 'Jumlah Cuti Melebihi 5 Hari')->withInput();
        }

        $cuti = Cuti::find($id);
        $cuti->pegawai_id = $request->pegawai_id;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan = $request->alasan;
        $cuti->save();

        return redirect('/cuti')->with('success', 'Success Update Cuti');
    }

    public function destroy($id){
        $cuti = Cuti::find($id);
        $cuti->delete();
        return redirect('/cuti')->with('success', 'Success Delete Cuti');
    }
}
