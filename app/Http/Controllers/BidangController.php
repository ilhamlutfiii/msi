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
        DB::table('bidang')->where('bidang_id',$id)->delete();
        return redirect('/bidang');        
    }
}
