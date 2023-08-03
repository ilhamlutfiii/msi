<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class pinjamController extends Controller
{
    public function index()
    {
        $pinjam = DB::table('view_pinjam')->get();
        return view('index-pinjam',['pinjam' => $pinjam]);
    }

    public function tambah_pinjam()
    {
    
        // memanggil view tambah
        $user = DB::table('user')->get();
        $komputer = DB::table('komputer')->get();
        return view('tambah-pinjam',['user' => $user],['komputer' => $komputer]);
    
    }

    public function store(Request $request)
    {
        $no_tiket = substr($request->no_tiket, 2);
        DB::table('pinjam')->insert([
            'user_id' => $request->user_id,
            'id_perangkat' => $request->id_perangkat,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'no_tiket' => $no_tiket
            
        ]);

        return redirect('/pinjam');
    
    }
    
    public function detail($id)
    {
		//ambil data dari table view_pinjam
        $pinjam = DB::table('view_pinjam')->where('pinjam_id',$id)->get();
		
		//ambil data dari table user
        $user = DB::table('user')->get();
        $komputer = DB::table('komputer')->get();
		
        return view('detail-pinjam',['pinjam' => $pinjam],['user' => $user,'komputer' => $komputer]);
    
    }

    public function edit($id)
    {
		//ambil data dari table view_pinjam
        $pinjam = DB::table('view_pinjam')->where('pinjam_id',$id)->get();
		
		//ambil data dari table user
        $user = DB::table('user')->get();
        $komputer = DB::table('komputer')->get();
		
        return view('edit-pinjam',['pinjam' => $pinjam],['user' => $user,'komputer' => $komputer]);
    
    }

    public function update(Request $request)
    {
        $no_tiket = substr($request->no_tiket, 2);
        DB::table('pinjam')->where('pinjam_id',$request->pinjam_id)->update([
            'user_id' => $request->user_id,
            'id_perangkat' => $request->id_perangkat,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'no_tiket' => $no_tiket
        ]);
       return redirect('/pinjam');
    }
    
    public function hapus($id)
    {
        $user_nama = DB::table('view_pinjam')->where('pinjam_id', $id)->value('user_nama');
        $id_perangkat = DB::table('view_pinjam')->where('pinjam_id', $id)->value('id_perangkat');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-pinjam', ['id' => $id, 'user_nama' => $user_nama, 'id_perangkat' => $id_perangkat]);
    }

    public function hapusConfirm($id)
    {
        DB::table('pinjam')->where('pinjam_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/pinjam');
    }    
}
