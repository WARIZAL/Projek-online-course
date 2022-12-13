<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function GetAllMember()
    {
        $data = DB::table('lembaga')->get();
        $dataUser = DB::table('user')->get();
        $dataMember = DB::table('member')->join('user', 'user.id_user', '=', 'member.id_user')->get();
        return view('admin.member', [
            'instansi' => $data,
            'users' => $dataUser,
            'member' => $dataMember,
            'title' => 'data member'
        ]);
    }
    public function AddMember(Request $request)
    {
        $validation = $request->validate([
            'id_user' => 'required',
            'kode_member' => 'required',
            'nama_member' => 'required',
            'tgl_lhr' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);
        // dd($validation);
        $imageName = time() . '.' . $request->foto->extension();
        // Public Folder
        $request->foto->move(public_path('foto'), $imageName);

        if ($validation == true) {
            $data = DB::table('member')->insert([
                'id_user' => $request->id_user,
                'kode_member' => $request->kode_member,
                'nama_member' => $request->nama_member,
                'tgl_lhr' => $request->tgl_lhr,
                'foto' => $imageName,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);
            return redirect('member');
        }
    }
    public function UpdateMemberById(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'kode_member' => 'required',
            'nama_member' => 'required',
            'tgl_lhr' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);
        // dd($data);
        $imageName = time() . '.' . $request->foto->extension();
        // Public Folder
        $request->foto->move(public_path('foto'), $imageName);

        $data = array(
            'id_user' => $request->post('id_user'),
            'kode_member' => $request->post('kode_member'),
            'nama_member' => $request->post('nama_member'),
            'tgl_lhr' => $request->post('tgl_lhr'),
            'foto' => $imageName,
            'gender' => $request->post('gender'),
            'alamat' => $request->post('alamat'),
            'email' => $request->post('email'),
            'telepon' => $request->post('telepon')
        );
        DB::table('member')->where('id_member', '=', $request->post('id_member'))->update($data);
        return redirect('member');
    }
    public function DeleteMemberById($id)
    {
        DB::table('member')->where('id_member', '=', $id)->delete();
        return redirect('member');
    }
}
