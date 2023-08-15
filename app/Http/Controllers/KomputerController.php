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
        $validator = Validator::make($request->all(), [
            'id_perangkat' => 'required|unique:komputer,id_perangkat',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
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
        $komputer = DB::table('view_komputer')->where('komp_id',$id)->get();
		
		//ambil data dari table ip
        $ip = DB::table('ip')->get();
        $os = DB::table('os')->get();
		
        return view('detail-komputer',['komputer' => $komputer],['ip' => $ip,'os' => $os]);
    
    }

    public function log($id)
    {
        $logs = DB::table('view_log')->where('komp_id', $id)->get();
        $id_perangkat = DB::table('view_log')->where('komp_id', $id)->value('id_perangkat');

        return view('index-log', [
            'logs' => $logs,
            'id_perangkat' => $id_perangkat
        ]);
    }

    public function edit($id)
    {
		//ambil data dari table view_komputer
        $komputer = DB::table('view_komputer')->where('komp_id',$id)->get();
		
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

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $komputer = DB::table('view_komputer')
        ->Where('komp_id', 'LIKE', "%$keyword%")
        ->orWhere('id_perangkat', 'LIKE', "%$keyword%")
        ->orWhere('hostname', 'LIKE', "%$keyword%")
        ->orwhere('merk_type', 'LIKE', "%$keyword%")
        ->orWhere('port', 'LIKE', "%$keyword%")
        ->orWhere('kategori', 'LIKE', "%$keyword%")
        ->orWhere('pengguna', 'LIKE', "%$keyword%")
        ->orWhere('ip_address', 'LIKE', "%$keyword%")
        ->orWhere('lokasi', 'LIKE', "%$keyword%")
        ->orWhere('referensi', 'LIKE', "%$keyword%")
        ->orWhere('os_name', 'LIKE', "%$keyword%")
        ->orWhere('ram_hdd', 'LIKE', "%$keyword%")
        ->orWhere('inventaris', 'LIKE', "%$keyword%")
        ->orWhere('status', 'LIKE', "%$keyword%")
        ->orWhere('penggunaan', 'LIKE', "%$keyword%")
        ->orWhere('keterangan', 'LIKE', "%$keyword%")
        ->orWhere('mac', 'LIKE', "%$keyword%")
        ->orWhere('macc', 'LIKE', "%$keyword%")
        ->orWhere('tahun', 'LIKE', "%$keyword%")
        ->get();
    return view('index-komputer', compact('komputer'));
    }
    
}
