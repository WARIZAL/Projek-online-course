<?php

namespace App\Http\Controllers;

use App\Models\KategoriModul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KtgrModulController extends Controller
{
    public function GetAllKtgrModul()
    {
        $data = DB::table('kategori_modul')->get();
        return view('admin.kategoriModul', [
            'kategoriModul' => $data,
            'title' => 'data kategori modul'
        ]);
    }
    public function AddKtgrModul(Request $request)
    {
        $validasi = $request->validate([
            'jenis_modul' => 'required'
        ]);
        if ($validasi == true) {
            DB::table('kategori_modul')->insert([
                'jenis_modul' => $request->jenis_modul
            ]);
            return redirect('kategoriModul');
        }
    }
    public function UpdateByIdKtgrModul(Request $request)
    {
        $data = array(
            'jenis_modul' => $request->post('jenis_modul')
        );
        DB::table('kategori_modul')->where('id_kategori_modul', '=', $request->post('id_kategori_modul'))->update($data);
        return redirect('kategoriModul');
    }
    public function DeleteByIdKtgrModul($id)
    {
        DB::table('kategori_modul')->where('id_kategori_modul', '=', $id)->delete();
        return redirect('kategoriModul');
    }
}
