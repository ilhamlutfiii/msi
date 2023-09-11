<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        $user = DB::table('users')->get();
        $komputer = DB::table('komputer')->get();
        return view('tambah-pinjam',['user' => $user],['komputer' => $komputer]);
    
    }

    public function store(Request $request)
    {
        // Validasi data
        Session::flash('user_id', $request->user_id);
        Session::flash('komp_id', $request->komp_id);
        Session::flash('tgl_pinjam', $request->tgl_pinjam);
        Session::flash('tgl_kembali', $request->tgl_kembali);
        Session::flash('no_tiket', $request->no_tiket);
        
        $this->validate($request, [
            'user_id' => 'required',
            'komp_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'no_tiket' => 'required',
        ],[
            'user_id.required' => 'User ID wajib diisi',
            'komp_id.required' => 'ID Perangkat wajib diisi',
            'tgl_pinjam.required' => 'Tanggal Pinjam wajib diisi',
            'tgl_kembali.required' => 'Tanggal Kembali wajib diisi',
            'no_tiket.required' => 'No Tiket wajib diisi',
        ]);

        $no_tiket = $request->no_tiket;
        DB::table('pinjam')->insert([
            'user_id' => $request->user_id,
            'komp_id' => $request->komp_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'no_tiket' => $no_tiket,
            
        ]);

        return redirect('/pinjam');
    
    }
    
    public function detail($id)
    {
		//ambil data dari table view_pinjam
        $pinjam = DB::table('view_pinjam')->where('pinjam_id',$id)->get();
		
		//ambil data dari table user
        $user = DB::table('users')->get();
        $komputer = DB::table('komputer')->get();
		
        return view('detail-pinjam',['pinjam' => $pinjam],['user' => $user,'komputer' => $komputer]);
    
    }

    public function edit($id)
    {
		//ambil data dari table view_pinjam
        $pinjam = DB::table('view_pinjam')->where('pinjam_id',$id)->get();
		
		//ambil data dari table user
        $user = DB::table('users')->get();
        $komputer = DB::table('komputer')->get();
		
        return view('edit-pinjam',['pinjam' => $pinjam],['user' => $user,'komputer' => $komputer]);
    
    }

    public function update(Request $request)
    {
        $no_tiket = $request->no_tiket;
        DB::table('pinjam')->where('pinjam_id',$request->pinjam_id)->update([
            'user_id' => $request->user_id,
            'komp_id' => $request->komp_id,
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
        
        return view('hapus-pinjam', ['id' => $id, 'user_nama' => $user_nama, 'id_perangkat' => $id_perangkat]);
    }

    public function hapusConfirm($id)
    {
        DB::table('pinjam')->where('pinjam_id', $id)->delete();
        return redirect('/pinjam');
    }    

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $pinjam = DB::table('view_pinjam')
        ->Where('pinjam_id', 'LIKE', "%$keyword%")
        ->orWhere('user_nama', 'LIKE', "%$keyword%")
        ->orwhere('user_nid', 'LIKE', "%$keyword%")
        ->orWhere('id_perangkat', 'LIKE', "%$keyword%")
        ->orWhere('tgl_pinjam', 'LIKE', "%$keyword%")
        ->orWhere('tgl_kembali', 'LIKE', "%$keyword%")
        ->orWhere('no_tiket', 'LIKE', "%$keyword%")
        ->get();
    
    return view('index-pinjam', compact('pinjam'));
    }
}
