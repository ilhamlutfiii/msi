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
        DB::table('jabatan')->where('jabatan_id',$id)->delete();
        return redirect('/jabatan');        
    }

}
