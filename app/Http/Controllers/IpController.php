<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IpController extends Controller
{
    //index untuk ip
	public function index()
	{
		$ip = DB::table('ip')->get();
		
		return view ('index-ip', ['ip' => $ip]);
	}
	
	public function tambah_ip()
	{
		//memanggil fungsi tambah
		return view('tambah-ip');
	}
	
	public function store(Request $request)
	{
		DB::table('ip')->insert([
			'ip_address' => $request->ip_address,
            'bagian' => $request->bagian,
            'keterangan' => $request->keterangan,
		]);
		
		return redirect('/ip');
	}
	
	public function edit($id)
    {
        $ip = DB::table('ip')->where('ip_id',$id)->get();
		
        return view('edit-ip',['ip' => $ip]);
    }
	
    public function update(Request $request)
    {
        DB::table('ip')->where('ip_id',$request->ip_id)->update([
            'ip_address' => $request->ip_address,
            'bagian' => $request->bagian,
            'keterangan' => $request->keterangan
        ]);
       return redirect('/ip');
    }
	
	public function hapus($id)
    {
        DB::table('ip')->where('ip_id',$id)->delete();
        return redirect('/ip');        
    }
}
