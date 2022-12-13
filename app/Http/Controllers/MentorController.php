<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function GetAllMentor()
    {
        $data = DB::table('lembaga')->get();
        $dataUser = DB::table('user')->get();
        $dataBidang = DB::table('bidang')->get();
        $dataMentor = DB::table('mentor')->join('user', 'user.id_user', '=', 'mentor.id_user')
            ->join('bidang', 'bidang.id_bidang', '=', 'mentor.id_bidang')
            ->get();
        return view('admin.mentor', [
            'instansi' => $data,
            'users' => $dataUser,
            'bidang' => $dataBidang,
            'mentor' => $dataMentor,
            'title' => 'data mentor'
        ]);
    }
    public function AddMentor(Request $request)
    {
        $validation = $request->validate([
            'id_user' => 'required',
            'id_bidang' => 'required',
            'kode_mentor' => 'required',
            'nama_mentor' => 'required',
            'tgl_lhr' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);
        // dd($validation);
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('foto'), $imageName);

        if ($validation == true) {
            DB::table('mentor')->insert([
                'id_user' => $request->id_user,
                'id_bidang' => $request->id_bidang,
                'kode_mentor' => $request->kode_mentor,
                'nama_mentor' => $request->nama_mentor,
                'tgl_lhr' => $request->tgl_lhr,
                'foto' => $imageName,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);
            return redirect('mentor');
        }
    }
    public function UpdateMentorById(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_bidang' => 'required',
            'kode_mentor' => 'required',
            'nama_mentor' => 'required',
            'tgl_lhr' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('foto'), $imageName);

        $data = array(
            'id_user' => $request->post('id_user'),
            'id_bidang' => $request->post('id_bidang'),
            'kode_mentor' => $request->post('kode_mentor'),
            'nama_mentor' => $request->post('nama_mentor'),
            'tgl_lhr' => $request->post('tgl_lhr'),
            'foto' => $imageName,
            'gender' => $request->post('gender'),
            'alamat' => $request->post('alamat'),
            'email' => $request->post('email'),
            'telepon' => $request->post('telepon')
        );
        DB::table('mentor')->where('id_mentor', '=', $request->post('id_mentor'))->update($data);
        return redirect('mentor');
    }
    public function DeleteMentorById($id)
    {
        DB::table('mentor')->where('id_mentor', '=', $id)->delete();
        return redirect('mentor');
    }
}
