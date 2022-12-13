<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function GetAll()
    {
        $data = DB::table('lembaga')->get();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'instansi' => $data

        ]);
    }
}
