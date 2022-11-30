<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function GetAllUser()
    {
        $dataUser = DB::table('user')->get();
        return redirect('user', [
            'users' => $dataUser,
            'title' => 'data all user'
        ]);
    }
    public function RegisterUser()
    {
    }
    public function LoginAuth()
    {
    }
    public function Logout()
    {
    }
}
