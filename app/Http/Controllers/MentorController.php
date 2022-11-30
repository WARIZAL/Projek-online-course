<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function GetAllMentor()
    {
        $dataUser = DB::table('user')->get();
        $dataMentor = DB::table('mentor')->join('user', 'user.id_user', '=', 'mentor.id_user')->get();
        return view('admin.mentor', [
            'mentor' => $dataMentor,
            'title' => 'data mentor'
        ]);
    }
    public function AddMentor(Request $request)
    {
        $validation = $request->validate([
            'id_user' => 'required',
            'kode_mentor' => 'required',
            'nama_mentor' => 'required',
            'tgl_lhr' => 'required',
            'foto' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);
        if ($validation == true) {
            $data = DB::table('mentor')->insert([
                'id_user' => $request->id_user,
                'kode_mentor' => $request->kode_mentor,
                'nama_mentor' => $request->nama_mentor,
                'tgl_lhr' => $request->tgl_lhr,
                'foto' => $request->foto,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);
            return redirect('Mentor');
        }
    }
    public function UpdateMentorById(Request $request)
    {
        $data = array([
            'id_user' => $request->post('id_user'),
            'kode_mentor' => $request->post('kode_mentor'),
            'nama_mentor' => $request->post('nama_mentor'),
            'tgl_lhr' => $request->post('tgl_lhr'),
            'foto' => $request->post('foto'),
            'gender' => $request->post('gender'),
            'alamat' => $request->post('alamat'),
            'email' => $request->post('email'),
            'telepon' => $request->post('telepon')
        ]);
        DB::table('mentor')->where('id_mentor', '=', $request->post('id_mentor'))->update($data);
        return redirect('mentor');
    }
    public function DeleteMentorById($id)
    {
        DB::table('mentor')->where('id_mentor', '=', $id)->delete();
        return redirect('mentor');
    }
}
