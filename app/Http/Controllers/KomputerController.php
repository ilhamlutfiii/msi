<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class KomputerController extends Controller
{
    public function index()
    {
        $komputer = DB::table('view_komputer')->get();
        return view('index-komputer',['komputer' => $komputer]);
    }

    public function tambah_komputer()
    {
    
        // memanggil view tambah
        $ip = DB::table('ip')->get();
        $os = DB::table('os')->get();
        return view('tambah-komputer',['ip' => $ip],['os' => $os]);
    
    }

    public function store(Request $request)
    {
        // Validasi data formulir
    $validator = Validator::make($request->all(), [
        'id_perangkat' => 'required|unique:komputer',
        // Tambahkan aturan validasi untuk kolom lain jika diperlukan
    ]);

    // Cek apakah validasi berhasil
    if ($validator->fails()) {
        return redirect('/komputer/tambah_komputer')
                    ->withErrors($validator)
                    ->withInput();
    }
        DB::table('komputer')->insert([
            'id_perangkat' => $request->id_perangkat,
            'hostname' => $request->hostname,
            'merk_type' => $request->merk_type,
            'port' => $request->port,
            'kategori' => $request->kategori,
            'pengguna' => $request->pengguna,
            'ip_id' => $request->ip_id,
            'lokasi' => $request->lokasi,
            'referensi' => $request->referensi,
            'os_id' => $request->os_id,
            'inventaris' => $request->inventaris,
            'status' => $request->status,
            'penggunaan' => $request->penggunaan,
            'keterangan' => $request->keterangan,
            'mac' => $request->mac,
            'macc' => $request->macc,
            'tahun' => $request->tahun,
        ]);

        return redirect('/komputer');
    
    }
    
    public function detail($id)
    {
		//ambil data dari table view_komputer
        $komputer = DB::table('view_komputer')->where('id_perangkat',$id)->get();
		
		//ambil data dari table ip
        $ip = DB::table('ip')->get();
        $os = DB::table('os')->get();
		
        return view('detail-komputer',['komputer' => $komputer],['ip' => $ip,'os' => $os]);
    
    }

    public function log($idPerangkat)
    {
        $logs = DB::table('view_log')->where('id_perangkat', $idPerangkat)->get();

        return view('index-log', [
            'logs' => $logs,
            'id_perangkat' => $idPerangkat
        ]);
    }

    public function edit($id)
    {
		//ambil data dari table view_komputer
        $komputer = DB::table('view_komputer')->where('id_perangkat',$id)->get();
		
		//ambil data dari table ip
        $ip = DB::table('ip')->get();
        $os = DB::table('os')->get();
		
        return view('edit-komputer',['komputer' => $komputer],['ip' => $ip,'os' => $os]);
    
    }

    public function update(Request $request)
    {
        DB::table('komputer')->where('komp_id',$request->komp_id)->update([
            'id_perangkat'=>$request->id_perangkat,
            'hostname' => $request->hostname,
            'merk_type' => $request->merk_type,
            'port' => $request->port,
            'kategori' => $request->kategori,
            'pengguna' => $request->pengguna,
            'ip_id' => $request->ip_id,
            'lokasi' => $request->lokasi,
            'referensi' => $request->referensi,
            'os_id' => $request->os_id,
            'inventaris' => $request->inventaris,
            'status' => $request->status,
            'penggunaan' => $request->penggunaan,
            'keterangan' => $request->keterangan,
            'mac' => $request->mac,
            'macc' => $request->macc,
            'tahun' => $request->tahun
        ]);
       return redirect('/komputer');
    }
    
    public function hapus($id)
    {
        $id_perangkat = DB::table('view_komputer')->where('komp_id', $id)->value('id_perangkat');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-komputer', ['id' => $id, 'id_perangkat' => $id_perangkat]);
    }

    public function hapusConfirm($id)
    {
        DB::table('komputer')->where('komp_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/komputer');
    }        
    
}
