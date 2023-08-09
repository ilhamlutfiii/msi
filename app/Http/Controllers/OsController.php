<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OsController extends Controller
{
    //index untuk os
	public function index()
	{
		$os = DB::table('os')->get();
		
		return view ('index-os', ['os' => $os]);
	}
	
	public function tambah_os()
	{
		//memanggil fungsi tambah
		return view('tambah-os');
	}
	
	public function store(Request $request)
	{
		DB::table('os')->insert([
			'os_name' => $request->os_name,
            'ram_hdd' => $request->ram_hdd
		]);
		
		return redirect('/os');
	}
	
	public function edit($id)
    {
        $os = DB::table('os')->where('os_id',$id)->get();
		
        return view('edit-os',['os' => $os]);
    }
	
    public function update(Request $request)
    {
        DB::table('os')->where('os_id',$request->id)->update([
            'os_name' => $request->os_name,
            'ram_hdd' => $request->ram_hdd
        ]);
       return redirect('/os');
    }
	
	public function hapus($id)
    {
        $os_name = DB::table('os')->where('os_id', $id)->value('os_name');
        $ram_hdd = DB::table('os')->where('os_id', $id)->value('ram_hdd');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-os', ['id' => $id, 'os_name' => $os_name, 'ram_hdd' => $ram_hdd]);
    }

    public function hapusConfirm($id)
    {
        DB::table('os')->where('os_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/os');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $os = DB::table('os')
        ->Where('os_id', 'LIKE', "%$keyword%")
        ->orWhere('os_name', 'LIKE', "%$keyword%")
        ->orwhere('ram_hdd', 'LIKE', "%$keyword%")
        ->get();
    return view('index-os', compact('os'));
    }
}
