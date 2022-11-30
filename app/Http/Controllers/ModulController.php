<?php

namespace App\Http\Controllers;

use App\Models\KategoriModul;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulController extends Controller
{
    public function GetAllModul()
    {
        $data = DB::table('kategori_modul')->get();
        $join = DB::table('modul')
            ->join('kategori_modul', 'kategori_modul.id_kategori_modul', '=', 'modul.id_kategori_modul')
            ->join('kelas', 'kelas.id_modul', '=', 'modul,id_kelas')
            ->get();
        return view('admin.modul', [
            'joinTbl' => $join,
            'title' => 'data modul',
        ]);
    }
    public function AddModul(Request $request)
    {
        $validasi = $request->validate([
            'id_kategori_modul' => 'required',
            'id_kelas' => 'required',
            'nama_modul' => 'required',
            'jml_modul' => 'required',
            'tgl_terbit' => 'required',
            'penulis' => 'required',
        ]);
        if ($validasi == true) {
            DB::table('modul')->insert([
                'id_kategori_modul' => $request->id_kategori_modul,
                'id_kelas' => $request->id_kelas,
                'nama_modul' => $request->nama_modul,
                'jml_modul' => $request->jml_modul,
                'tgl_terbit' => $request->tgl_terbit,
                'penulis' => $request->penulis
            ]);
            return redirect('modul');
        }
    }
    public function UpdateModulById(Request $request)
    {
        $data = array(
            'id_kategori_modul' => $request->post('id_kategori_modul'),
            'id_kelas' => $request->post('id_kelas'),
            'nama_modul' => $request->post('nama_modul'),
            'jml_modul' => $request->post('jml_modul'),
            'tgl_terbit' => $request->post('tgl_terbit'),
            'penulis' => $request->post('penulis')
        );
        DB::table('modul')->where('id_modul', '=', $request->post('id_modul'))->update($data);
        return redirect('modul');
    }
    public function DeleteModulById($id)
    {
        DB::table('modul')->where('id_modul', '=', $id)->delete();
        return redirect('modul');
    }
}
