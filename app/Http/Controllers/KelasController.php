<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kelas;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function GetAllKelas()
    {
        $data = DB::table('lembaga')->get();
        $dataBidang = DB::table('bidang')->get();
        $dataMember = DB::table('member')->get();
        $dataKelas = DB::table('kelas')
            ->join('bidang', 'bidang.id_bidang', '=', 'kelas.id_bidang')
            ->join('member', 'member.id_member', '=', 'kelas.id_member')
            ->get();
        // dd($dataKelas);
        return view('admin.kelas', [
            'instansi' => $data,
            'data_member' => $dataMember,
            'data_bidang' => $dataBidang,
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
        // dd($validation);
        if ($validation == true) {
            $data = DB::table('kelas')->insert([
                'id_member' => $request->id_member,
                'id_bidang' => $request->id_bidang,
                'jenis_kelas' => $request->jenis_kelas,
                'harga_kelas' => $request->harga_kelas,
                'lama_course' => $request->lama_course,
                'tgl_bayar' => $request->tgl_bayar,
                'tanggal_berakhir' => $request->tanggal_berakhir
            ]);
            return redirect('kelas');
        }
    }
    public function UpdateKelasById(Request $request)
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
        // dd($validation);
        if ($validation == true) {
            $data = array(
                'id_member' => $request->post('id_member'),
                'id_bidang' => $request->post('id_bidang'),
                'jenis_kelas' => $request->post('jenis_kelas'),
                'harga_kelas' => $request->post('harga_kelas'),
                'lama_course' => $request->post('lama_course'),
                'tgl_bayar' => $request->post('tgl_bayar'),
                'tanggal_berakhir' => $request->post('tanggal_berakhir')
            );
            DB::table('kelas')->where('id_kelas', '=', $request->post('id_kelas'))->update($data);
            // DB::table('mentor')->where('id_mentor', '=', $request->post('id_mentor'))->update($data);
            // DB::table('produks')->where('produk_id', '=', $request->post('produk_id'))->update($data);
            return redirect('kelas');
        }
    }
    public function DeleteKelasById($id)
    {
        DB::table('kelas')->where('id_kelas', '=', $id)->delete();
        return redirect('kelas');
    }
}
