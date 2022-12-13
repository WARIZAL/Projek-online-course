<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LembagaController extends Controller
{
    public function GetLembaga()
    {
        $data = DB::table('lembaga')->get();
        return view('admin.instansi', [
            'instansi' => $data,
            'title' => 'data instansi'
        ]);
    }
    public function AddLembaga(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'tentang' => 'required'
        ]);
        // dd($validate);
        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logo'), $logoName);
        DB::table('lembaga')->insert([
            'nama' => $request->nama,
            'logo' => $logoName,
            'tentang' => $request->tentang,
        ]);
        return redirect('instansi');
    }
    public function UpdateById(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'tentang' => 'required'
        ]);
        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logo'), $logoName);
        $data = array(
            'nama' => $request->post('nama'),
            'logo' => $logoName,
            'tentang' => $request->post('tentang'),
        );
        DB::table('lembaga')->where('id_lembaga', '=', $request->post('id_lembaga'))->update($data);
        return redirect('instansi');
    }
    public function DeleteById($id)
    {
        DB::table('lembaga')->where('id_lembaga', '=', $id)->delete();
        return redirect('instansi');
    }
}
