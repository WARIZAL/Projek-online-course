<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function GetAllKelas()
    {
        $dataBidang = DB::table('bidang')->get();
        $dataMember = DB::table('member')->get();
        $dataKelas = DB::table('kelas')
            ->join('bidang', 'bidang.id_bidang', '=', 'kelas.id_bidang')
            ->join('member', 'member.id_member', '=', 'kelas.id_member')
            ->get();
        return view('admin.kelas', [
            'joinKelas' => $dataKelas,
            'title' => 'data kelas'
        ]);
    }
    public function AddKelas(Request $request)
    {
        $validation = $request->validate([
            'id_member' => 'required',
            'id_bidang' => 'required',
            'jenis_kelas' => 'required',
            'harga_kelas' => 'required',
            'lama_course' => 'required',
            'tgl_bayar' => 'required',
            'tanggal_berakhir' => 'required'
        ]);
        if ($validation == true) {
            $data = DB::table('kelas')->insert([
                'id_member' => $request->id_member,
                'id_bidang' => $request->id_bidang,
                'jenis_kelas' => $request->jenis_kelas,
                'harga_kelas' => $request->harga_kelas,
                'lama_course' => $request->lama_course,
                'tgl_bayar' => $request->tgl_bayar,
                'tanggal_berakhir' => $request->tgl_berakhir
            ]);
            return redirect('kelas');
        }
    }
    public function UpdateKelasById(Request $request)
    {
        $data = array([
            'id_member' => $request->post('id_member'),
            'id_bidang' => $request->post('id_bidang'),
            'jenis_kelas' => $request->post('jenis_kelas'),
            'harga_kelas' => $request->post('harga_kelas'),
            'lama_course' => $request->post('lama_course'),
            'tgl_bayar' => $request->post('tgl_bayar'),
            'tanggal_berakhir' => $request->post('tgl_berakhir')

        ]);
        DB::table('kelas')->where('id_kelas', '=', $request->post('id_kelas'))->update($data);
        return redirect('kelas');
    }
    public function DeleteKelasById($id)
    {
        DB::table('kelas')->where('id_kelas', '=', $id)->delete();
        return redirect('kelas');
    }
}
