<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('view_user')->get();
		
        return view('index-user',['user' => $user]);
    }

    public function tambah_user()
    {
        // memanggil view tambah
        $user = DB::table('user')->get(); // ambil data dari table user
        $unit = DB::table('unit')->get(); // ambil data dari table unit
        $bidang = DB::table('bidang')->get(); // ambil data dari table bidang
        $fungsi = DB::table('fungsi')->get(); // ambil data dari table fungsi
        $jabatan = DB::table('jabatan')->get(); // ambil data dari table fungsi
        
		return view('tambah-user',['user' => $user, 'unit' => $unit, 'bidang' => $bidang, 'fungsi' => $fungsi,'jabatan' => $jabatan]);
    
    }

    public function store(Request $request)
    {
        DB::table('user')->insert([
            'user_nid' => $request->user_nid,
            'user_nama' => $request->user_nama,
            'jabatan_id' => $request->jabatan_id,
            'bidang_id' => $request->bidang_id,
            'fungsi_id' => $request->fungsi_id,
            'user_password' => $request->user_password,
        ]);

        return redirect('/user');
    
    }
    
    public function edit($id)
    {
		//ambil data dari table view_user
        $user = DB::table('view_user')->where('user_id',$id)->get();
		
		//ambil data dari table user
        $unit = DB::table('unit')->get(); // ambil data dari table unit
        $bidang = DB::table('bidang')->get(); // ambil data dari table bidang
        $fungsi = DB::table('fungsi')->get(); // ambil data dari table fungsi
        $jabatan = DB::table('jabatan')->get(); // ambil data dari table jabatan
		
        return view('edit-user',['user' => $user],['user' => $user, 'unit' => $unit, 'bidang' => $bidang, 'fungsi' => $fungsi,'jabatan' => $jabatan]);
    
    }

    public function update(Request $request)
    {
        DB::table('user')->where('user_id',$request->user_id)->update([
            'user_nid' => $request->user_nid,
            'user_nama' => $request->user_nama,
            'jabatan_id' => $request->jabatan_id,
            'bidang_id' => $request->bidang_id,
            'fungsi_id' => $request->fungsi_id,
            'user_password' => $request->user_password
        ]);
       return redirect('/user');
    }

    public function hapus($id)
    {
        DB::table('user')->where('user_id',$id)->delete();
        return redirect('/user');        
    }
}
