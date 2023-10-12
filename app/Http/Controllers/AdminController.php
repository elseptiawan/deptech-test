<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (! Auth::attempt($request->only('email', 'password'))) {
            return back()->with('loginError', 'Wrong Email or Password')->withInput();
        }

        $request->session()->regenerate();
        // $user = User::where('email', $request->email)->first();

        return redirect()->intended('admin');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function index()
    {
        $admin = Admin::all();
        return view('Pages.Admin.ListAdmin', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('Pages.Admin.EditAdmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = Admin::find($id);
        $admin->nama_depan = $request->nama_depan;
        $admin->nama_belakang = $request->nama_belakang;
        $admin->email = $request->email;
        $admin->save();
        return redirect('/admin')->with('success', 'Success Edit Data Admin');
    }

    public function create()
    {
        return view('Pages.Admin.CreateAdmin');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = new Admin();
        $admin->nama_depan = $request->nama_depan;
        $admin->nama_belakang = $request->nama_belakang;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('/admin')->with('success', 'Success Create Admin');
    }

    public function destroy($id){
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/admin')->with('success', 'Success Delete Admin');
    }
}
