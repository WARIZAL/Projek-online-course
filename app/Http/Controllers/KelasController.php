<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kelas;
use App\Models\Lembaga;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function GetAllKelas()
    {
        $data = Lembaga::all();
        $dataBidang = Bidang::all();
        $dataMember = Member::all();
        $dataKelas = DB::table('kelas')
            ->join('bidang', 'bidang.id_bidang', '=', 'kelas.id_bidang')
            ->join('member', 'member.id_member', '=', 'kelas.id_member')
            ->get();
        if (Auth::user()->role == 'admin') {
            return view('admin.kelas', [
                'instansi' => $data,
                'data_member' => $dataMember,
                'data_bidang' => $dataBidang,
                'joinKelas' => $dataKelas,
                'title' => 'data kelas'
            ]);
        } else {
            print('akses di tolak');
        }
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
            $add = new Kelas([
                'id_member' => $request->id_member,
                'id_bidang' => $request->id_bidang,
                'jenis_kelas' => $request->jenis_kelas,
                'harga_kelas' => $request->harga_kelas,
                'lama_course' => $request->lama_course,
                'tgl_bayar' => $request->tgl_bayar,
                'tanggal_berakhir' => $request->tanggal_berakhir
            ]);
            $add->save();
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
            Kelas::where('id_kelas', '=', $request->post('id_kelas'))->update($data);
            return redirect('kelas');
        }
    }
    public function DeleteKelasById($id)
    {
        Kelas::where('id_kelas', '=', $id)->delete();
        return redirect('kelas');
    }
}
