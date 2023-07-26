<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class osController extends Controller
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
        DB::table('os')->where('os_id',$id)->delete();
        return redirect('/os');        
    }
}
