<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


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
        Session::flash('ip_address', $request->ip_address);
        Session::flash('bagian', $request->bagian);
        Session::flash('keterangan', $request->keterangan);

        $this->validate($request, [
            'ip_address' => 'required',
            'bagian' => 'required',
            'keterangan' => 'required'
        ],[
			'ip_address.required' => 'IP Address wajib diisi',
            'bagian.required' => 'Bagian wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi',
		]);

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
        $ip_address = DB::table('ip')->where('ip_id', $id)->value('ip_address');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-ip', ['id' => $id, 'ip_address' => $ip_address]);
    }

    public function hapusConfirm($id)
    {
        DB::table('ip')->where('ip_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/ip');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $ip = DB::table('ip')
        ->Where('ip_id', 'LIKE', "%$keyword%")
        ->orWhere('ip_address', 'LIKE', "%$keyword%")
        ->orwhere('bagian', 'LIKE', "%$keyword%")
        ->orWhere('keterangan', 'LIKE', "%$keyword%")
        ->get();
    return view('index-ip', compact('ip'));
    }
}
