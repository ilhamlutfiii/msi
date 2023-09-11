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
        // Mengambil semua data yang dibutuhkan dari request
        $data = $request->only([
            'user_nid',
            'user_nama',
            'jabatan_id',
            'bidang_id',
            'fungsi_id',
            'password', // Termasuk field password
            'cpass '
        ]);
        
        // Memeriksa apakah field "password" ada dalam permintaan
        if ($request->has('password')&& $request->password !== '0' && $request->password !== null) {
            $hashedPassword = bcrypt($request->password);
            $data['password'] = $hashedPassword;
        }

        // Validasi data
        Session::flash('user_nid', $request->user_nid);
        Session::flash('user_nama', $request->user_nama);
        Session::flash('password', $request->password);
        Session::flash('cpass', $request->cpass);
        
        $this->validate($request, [
            'user_nid' => 'required',
            'user_nama' => 'required',
            'bidang_id' => 'required',
            'fungsi_id' => 'required',
            'jabatan_id' => 'required',
            'cpass' => 'same:password',
        ],[
            'user_nid.required' => 'User NID wajib diisi',
            'user_nama.required' => 'Nama User wajib diisi',
            'bidang_id.required' => 'Bidang wajib diisi',
            'fungsi_id.required' => 'Fungsi wajib diisi',
            'jabatan_id.required' => 'Jabatan wajib diisi',
            'cpass.same:password' => 'Konfirmasi password harus sama dengan password',
            
        ]);

        // Simpan data ke dalam database
        DB::table('users')->insert($data);

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
        $data = $request->only([
            'user_nid',
            'user_nama',
            'jabatan_id',
            'bidang_id',
            'fungsi_id',
            'password',
            'cpass'
        ]);
    
        // Memeriksa apakah field "password" ada dalam permintaan
        if ($request->has('password')&& $request->password !== '0' && $request->password !== null) {
            $hashedPassword = bcrypt($request->password);
            $data['password'] = $hashedPassword;
        }
    
        // Validasi data
        $this->validate($request, [
            'user_nid' => 'required',
            'user_nama' => 'required',
            'cpass' => 'same:password'
        ], [
            'cpass.same' => 'Konfirmasi Password harus sama dengan password.'
        ]);

        DB::table('users')->where('user_id', $request->user_id)->update($data);

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
