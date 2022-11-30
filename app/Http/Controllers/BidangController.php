<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function GetAllBidang()
    {
        $bidang = DB::table('bidang')->get();
        // dd($bidang);
        return view('admin.bidang', [
            'bidang' => $bidang,
            'title' => 'data bidang'
        ]);
    }
    public function AddBidang(Request $request)
    {
        $validasi = $request->validate([
            'nama_bidang' => 'required'
        ]);
        if ($validasi == true) {
            DB::table('bidang')->insert([
                'nama_bidang' => $request->nama_bidang
            ]);
            return redirect('bidang');
        }
    }
    public function UpdateByIdBidang(Request $request)
    {
        $data = array(
            'nama_bidang' => $request->post('nama_bidang')
        );
        DB::table('bidang')->where('id_bidang', '=', $request->post('id_bidang'))->update($data);
        return redirect('bidang');
    }
    public function DeleteByIdBidang($id)
    {
        DB::table('bidang')->where('id_bidang', '=', $id)->delete();
        return redirect('bidang');
    }
}
