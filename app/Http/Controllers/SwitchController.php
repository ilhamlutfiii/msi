<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SwitchController extends Controller
{
    public function index()
    {
        $switch = DB::table('view_switch')->get();
        return view('index-switch',['switch' => $switch]);
    }

    public function tambah_switch()
    {
    
        // memanggil view tambah
        $ip = DB::table('ip')->get();
        return view('tambah-switch',['ip' => $ip]);
    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'swtch_id' => 'required|unique:switch',
            // Tambahkan aturan validasi untuk kolom lain jika diperlukan
        ]);
    
        // Cek apakah validasi berhasil
        if ($validator->fails()) {
            return redirect('/switch/tambah_switch')
                        ->withErrors($validator)
                        ->withInput();
        }
        DB::table('switch')->insert([
            'switch_id' => $request->switch_id,
            'port' => $request->port,
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'sn' => $request->sn,
            'letak' => $request->letak,
            'mac' => $request->mac,
            'macc' => $request->macc,
            'ip_id' => $request->ip_id,
            'referensi' => $request->referensi
        ]);

        return redirect('/switch');
    
    }

    public function detail($id)
    {
		//ambil data dari table view_switch
        $switch = DB::table('view_switch')->where('switch_id',$id)->get();
		
		//ambil data dari table ip
        $ip = DB::table('ip')->get();
		
        return view('detail-switch',['switch' => $switch], ['ip' => $ip]);
    }

    
    public function edit($id)
    {
		//ambil data dari table view_switch
        $switch = DB::table('view_switch')->where('switch_id',$id)->get();
		
		//ambil data dari table ip
        $ip = DB::table('ip')->get();
		
        return view('edit-switch',['switch' => $switch], ['ip' => $ip]);
    
    }

    public function update(Request $request)
    {
        DB::table('switch')->where('switch_id',$request->switch_id)->update([
            'port' => $request->port,
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'sn' => $request->sn,
            'letak' => $request->letak,
            'mac' => $request->mac,
            'macc' => $request->macc,
            'ip_id' => $request->ip_id,
            'referensi' => $request->referensi
        ]);
       return redirect('/switch');
    }

    public function hapus($id)
    {
        $nama = DB::table('view_switch')->where('switch_id', $id)->value('nama');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-switch', ['id' => $id, 'nama' => $nama]);
    }

    public function hapusConfirm($id)
    {
        DB::table('switch')->where('switch_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/switch');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $switch = DB::table('view_switch')
        ->Where('switch_id', 'LIKE', "%$keyword%")
        ->orWhere('port', 'LIKE', "%$keyword%")
        ->orwhere('nama', 'LIKE', "%$keyword%")
        ->orWhere('tipe', 'LIKE', "%$keyword%")
        ->orWhere('sn', 'LIKE', "%$keyword%")
        ->orWhere('letak', 'LIKE', "%$keyword%")
        ->orWhere('mac', 'LIKE', "%$keyword%")
        ->orWhere('macc', 'LIKE', "%$keyword%")
        ->orWhere('ip_address', 'LIKE', "%$keyword%")
        ->orWhere('referensi', 'LIKE', "%$keyword%")
        ->get();
    
    return view('index-switch', compact('switch'));
    }

}
