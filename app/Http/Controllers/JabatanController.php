<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = DB::table('jabatan')->get();

        return view('index-jabatan',['jabatan' => $jabatan]);
    }

    public function tambah()
    {
        // memanggil view tambah
        return view('tambah-jabatan');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jabatan_name' => 'required',
        ],[
			'jabatan_name.required' => 'Nama Jabatan wajib diisi',
		]);

        DB::table('jabatan')->insert([
            'jabatan_name' => $request->jabatan_nama
        ]);

        return redirect('/jabatan');
    
    }
    
    public function edit($id)
    {
        $jabatan = DB::table('jabatan')->where('jabatan_id',$id)->get();
        return view('edit-jabatan',['jabatan' => $jabatan]);
    
    }

    public function update(Request $request)
    {
        DB::table('jabatan')->where('jabatan_id',$request->id)->update([
            'jabatan_name' => $request->nama,
        ]);
       return redirect('/jabatan');
    }

    public function hapus($id)
    {
        $jabatan_name = DB::table('jabatan')->where('jabatan_id', $id)->value('jabatan_name');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-jabatan', ['id' => $id, 'jabatan_name' => $jabatan_name]);
    }

    public function hapusConfirm($id)
    {
        DB::table('jabatan')->where('jabatan_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/jabatan');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $jabatan = DB::table('jabatan')
        ->Where('jabatan_id', 'LIKE', "%$keyword%")
        ->orWhere('jabatan_name', 'LIKE', "%$keyword%")
        ->get();
    
    return view('index-jabatan', compact('jabatan'));
    }
}
