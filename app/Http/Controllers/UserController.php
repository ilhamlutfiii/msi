<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('view_user')->get();

        return view('index-user', compact('users'));
    }

    public function tambah_user()
    {
        $unit = DB::table('unit')->get();
        $bidang = DB::table('bidang')->get();
        $fungsi = DB::table('fungsi')->get();
        $jabatan = DB::table('jabatan')->get();

        return view('tambah-user', compact('unit', 'bidang', 'fungsi', 'jabatan'));
    }

    public function store(Request $request)
    {
        $hashedPassword = bcrypt($request->password);

        DB::table('users')->insert([
            'user_nid' => $request->user_nid,
            'user_nama' => $request->user_nama,
            'jabatan_id' => $request->jabatan_id,
            'bidang_id' => $request->bidang_id,
            'fungsi_id' => $request->fungsi_id,
            'password' => $hashedPassword,
        ]);

        return redirect('/user');
    }

    public function edit($id)
    {
        $users = DB::table('view_user')->where('user_id', $id)->get();
        $unit = DB::table('unit')->get();
        $bidang = DB::table('bidang')->get();
        $fungsi = DB::table('fungsi')->get();
        $jabatan = DB::table('jabatan')->get();

        return view('edit-user', compact('users', 'unit', 'bidang', 'fungsi', 'jabatan'));
    }

    public function update(Request $request)
    {
        $hashedPassword = bcrypt($request->password);

        DB::table('users')->where('user_id', $request->user_id)->update([
            'user_nid' => $request->user_nid,
            'user_nama' => $request->user_nama,
            'jabatan_id' => $request->jabatan_id,
            'bidang_id' => $request->bidang_id,
            'fungsi_id' => $request->fungsi_id,
            'password' => $hashedPassword
        ]);

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user_nama = DB::table('users')->where('user_id', $id)->value('user_nama');
        return view('hapus-user', compact('id', 'user_nama'));
    }

    public function hapusConfirm($id)
    {
        DB::table('users')->where('user_id', $id)->delete();
        return redirect('/user');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $users = DB::table('view_user')
            ->where('user_id', 'LIKE', "%$keyword%")
            ->orWhere('user_nid', 'LIKE', "%$keyword%")
            ->orWhere('user_nama', 'LIKE', "%$keyword%")
            ->orWhere('jabatan_name', 'LIKE', "%$keyword%")
            ->orWhere('bidang_name', 'LIKE', "%$keyword%")
            ->orWhere('fungsi_name', 'LIKE', "%$keyword%")
            ->get();
        return view('index-user', compact('users'));
    }
}
