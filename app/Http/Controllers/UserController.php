<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
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

        $data = Lembaga::all();
        $dataUser = User::all();
        if (Auth::user()->role == 'admin') {
            return view('admin.user', [
                'instansi' => $data,
                'users' => $dataUser,
                'title' => 'data all user'
            ]);
        } else {
            print('akses di tolak');
        }
    }
    public function GetRegister()
    {
        $data = Lembaga::all();
        return view('auth.register', [
            'lembaga' => $data,
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
        return redirect('login')->with('success', 'Registration success. Please login!');
    }
    public function login()
    {
        $data = Lembaga::all();
        return view('auth.login', [
            'lembaga' => $data,
            'title' => 'halaman login'
        ]);
    }
    public function LoginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only("username", "password"))) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route("dashboard");
            } elseif (Auth::user()->role == 'mentor') {
                return redirect()->route("dashboard");
            } elseif (Auth::user()->role == 'member') {
                return redirect()->route("dashboard");
            } else {
                print('anda tidak memiliki akun');
            }
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    public function UpdateByIdUser(Request $request)
    {
        $validation = $request->validate([
            'role' => 'required'
        ]);
        // dd($validation);
        if ($validation == true) {
            $edit = array(
                'role' => $request->post('role')
            );
            User::where('id_user', '=', $request->post('id_user'))->update($edit);
            return redirect('user');
        }
    }
    public function DeleteByIdUser($id)
    {
        User::where('id_user', '=', $id)->delete();
        return redirect('user');
    }
    public function Logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
