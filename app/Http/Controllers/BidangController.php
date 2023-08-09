<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BidangController extends Controller
{
    //index untuk bidang
	public function index()
	{
		$bidang = DB::table('bidang')->get();
		
		return view ('index-bidang', ['bidang' => $bidang]);
	}
	
	public function tambah()
	{
		//memanggil fungsi tambah
		return view('tambah-bidang');
	}
	
	public function store(Request $request)
	{
		DB::table('bidang')->insert([
			'bidang_name' => $request->bidang_nama
		]);
		
		return redirect('/bidang');
	}
	
	public function edit($id)
    {
        $bidang = DB::table('bidang')->where('bidang_id',$id)->get();
		
        return view('edit-bidang',['bidang' => $bidang]);
    }
	
    public function update(Request $request)
    {
        DB::table('bidang')->where('bidang_id',$request->id)->update([
            'bidang_name' => $request->bidang_nama,
        ]);
       return redirect('/bidang');
    }

	public function hapus($id)
    {
        $bidang_name = DB::table('bidang')->where('bidang_id', $id)->value('bidang_name');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-bidang', ['id' => $id, 'bidang_name' => $bidang_name]);
    }

    public function hapusConfirm($id)
    {
        DB::table('bidang')->where('bidang_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/bidang');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $bidang = DB::table('bidang')
        ->Where('bidang_id', 'LIKE', "%$keyword%")
        ->orWhere('bidang_name', 'LIKE', "%$keyword%")
        ->get();
    
    return view('index-bidang', compact('bidang'));
    }
}
