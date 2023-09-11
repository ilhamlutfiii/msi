<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        // Validasi data
        Session::flash('switch_id', $request->switch_id);
        Session::flash('port', $request->port);
        Session::flash('nama', $request->nama);
        Session::flash('tipe', $request->tipe);
        Session::flash('sn', $request->sn);
        Session::flash('letak', $request->letak);
        Session::flash('mac', $request->mac);
        Session::flash('macc', $request->macc);
        Session::flash('ip_id', $request->ip_id);
        Session::flash('referensi', $request->referensi);
        
        $this->validate($request, [
            'switch_id' => 'required',
            'port' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'sn' => 'required',
            'letak' => 'required',
            'mac' => 'required',
            'macc' => 'required',
            'ip_id' => 'required',
            'referensi' => 'required'
        ],[
            'switch_id.required' => 'Switch ID wajib diisi',
            'port.required' => 'Port wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'tipe.required' => 'Tipe wajib diisi',
            'sn.required' => 'SN wajib diisi',
            'letak.required' => 'Letak wajib diisi',
            'mac.required' => 'Mac wajib diisi',
            'macc.required' => 'Macc wajib diisi',
            'ip_id.required' => 'IP Address wajib diisi',
            'referensi.required' => 'Referensi wajib diisi'
        ]);
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
