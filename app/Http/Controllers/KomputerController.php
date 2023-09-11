<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
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
        $user = DB::table('users')->get();
        $ip = DB::table('ip')->get();
        $os = DB::table('os')->get();
        return view('tambah-komputer',['ip' => $ip],['os' => $os, 'user' => $user]);
    
    }

    public function store(Request $request)
    {
        Session::flash('id_perangkat', $request->id_perangkat);
        Session::flash('hostname', $request->hostname);
        Session::flash('merk_type', $request->merk_type);
        Session::flash('port', $request->port);
        Session::flash('kategori', $request->kategori);
        Session::flash('user_id', $request->user_id);
        Session::flash('ip_id', $request->ip_id);
        Session::flash('lokasi', $request->lokasi);
        Session::flash('referensi', $request->referensi);
        Session::flash('os_id', $request->os_id);
        Session::flash('inventaris', $request->inventaris);
        Session::flash('status', $request->status);
        Session::flash('penggunaan', $request->penggunaan);
        Session::flash('keterangan', $request->keterangan);
        Session::flash('mac', $request->mac);
        Session::flash('macc', $request->macc);
        Session::flash('tahun', $request->tahun);

        $this->validate($request, [
            'id_perangkat' => 'required',
            'kategori' => 'required',
            'user_id' => 'required',
            'ip_id' => 'required',
            'os_id' => 'required',
        ],[
            'id_perangkat.required' => 'ID Perangkat wajib diisi',
            'kategori.required' => 'Kategori wajib diisi',
            'user_id.required' => 'Nama User wajib diisi',
            'ip_id.required' => 'IP Address wajib diisi',
            'os_id.required' => 'OS -- Ram/HDD wajib diisi',
        ]);
        DB::table('komputer')->insert([
            'id_perangkat' => $request->id_perangkat,
            'hostname' => $request->hostname,
            'merk_type' => $request->merk_type,
            'port' => $request->port,
            'kategori' => $request->kategori,
            'user_id' => $request->user_id,
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
		$user = DB::table('users')->get();
        
        return view('detail-komputer',['komputer' => $komputer],['ip' => $ip,'os' => $os],['user' => $user]);
    
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
		$user = DB::table('users')->get();
		
        return view('edit-komputer', compact('komputer', 'ip', 'os', 'user'));
    
    }

    public function update(Request $request)
    {
        DB::table('komputer')->where('komp_id',$request->komp_id)->update([
            'id_perangkat'=>$request->id_perangkat,
            'hostname' => $request->hostname,
            'merk_type' => $request->merk_type,
            'port' => $request->port,
            'kategori' => $request->kategori,
            'user_id' => $request->user_id,
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
        ->orWhere('user_nama', 'LIKE', "%$keyword%")
        ->orWhere('user_nid', 'LIKE', "%$keyword%")
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
