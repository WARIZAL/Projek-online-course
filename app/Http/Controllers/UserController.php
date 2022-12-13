<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function GetAllUser()
    {
        $data = DB::table('lembaga')->get();
        $dataUser = DB::table('user')->get();
        return view('admin.user', [
            'instansi' => $data,
            'users' => $dataUser,
            'title' => 'data all user'
        ]);
    }
    public function GetRegister()
    {
        return view('auth.register', [
            'title' => 'register'
        ]);
    }
    public function CreateAkun(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $user = new User([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Registration success. Please login!');

        // $validation = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        // dd($validation);
        // // $data = $request->all();
        // // $check = $this->create($data);
        // // return redirect("dashboard")->withSuccess('You have signed-in');;
        // if ($validation == true) {
        //     DB::table('user')->create([
        //         'username' => $request->username,
        //         'password' => Hash::make($request->password),
        //         'role' => $request->role,

        //     ]);
        //     return redirect('register');
        // }
    }
    public function login()
    {
        return view('auth.login', ['title' => 'halaman login']);
    }
    public function LoginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    public function Logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
