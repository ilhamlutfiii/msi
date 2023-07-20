<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::table('switch')->where('switch_id',$id)->delete();
        return redirect('/switch');        
    }
}
