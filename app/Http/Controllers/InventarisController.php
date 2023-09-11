<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = DB::table('view_inventaris')->get();
        return view('index-inventaris', ['inventaris' => $inventaris]);
    }

    public function tambah_inventaris()
    {
        $users = DB::table('users')->get();
        $komputers = DB::table('komputer')->get();
        return view('tambah-inventaris', ['users' => $users, 'komputers' => $komputers]);
    }

    public function store(Request $request)
    {
        // Validasi data
        Session::flash('user_id', $request->user_id);
        Session::flash('komp_id', $request->komp_id);
        Session::flash('tgl_pinjam', $request->tgl_pinjam);
        
        $this->validate($request, [
            'user_id' => 'required',
            'komp_id' => 'required',
            'tgl_pinjam' => 'required',
        ],[
            'user_id.required' => 'User ID wajib diisi',
            'komp_id.required' => 'ID Perangkat wajib diisi',
            'tgl_pinjam.required' => 'Tanggal Pinjam wajib diisi',
        ]);
        
        DB::table('inventaris')->insert([
            'user_id' => $request->user_id,
            'komp_id' => $request->komp_id,
            'tgl_pinjam' => $request->tgl_pinjam
        ]);

        return redirect('/inventaris');
    }

    public function detail($id)
    {
        $inventaris = DB::table('view_inventaris')->where('inventaris_id', $id)->get();
        $users = DB::table('users')->get();
        $komputers = DB::table('komputer')->get();

        return view('detail-inventaris', [
            'inventaris' => $inventaris,
            'users' => $users,
            'komputers' => $komputers
        ]);
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
        $inventaris = DB::table('view_inventaris')->where('inventaris_id', $id)->get();
        $users = DB::table('users')->get();
        $komputers = DB::table('komputer')->get();

        return view('edit-inventaris', [
            'inventaris' => $inventaris,
            'users' => $users,
            'komputers' => $komputers
        ]);
    }

    public function update(Request $request)
    {
        DB::table('inventaris')->where('inventaris_id', $request->inventaris_id)->update([
            'user_id' => $request->user_id,
            'komp_id' => $request->komp_id,
            'tgl_pinjam' => $request->tgl_pinjam
        ]);

        return redirect('/inventaris');
    }

    public function hapus($id)
    {
        $inventarisData = DB::table('view_inventaris')->where('inventaris_id', $id)->first();

        return view('backup-inventaris', ['inventarisData' => $inventarisData]);
    }

    public function storeLog(Request $request, $id)
    {
        // Validasi data
        Session::flash('tgl_kembali', $request->tgl_kembali);
        Session::flash('keterangan', $request->keterangan);
        
        
        $this->validate($request, [
            'tgl_kembali' => 'required',
            'keterangan' => 'required',
            
        ],[
            'tgl_kembali.required' => 'Tanggal Kembali wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi',
            
        ]);
        
        DB::table('log')->insert([
            'user_id' => $request->user_id,
            'komp_id' => $request->komp_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'keterangan' => $request->keterangan
        ]);
        
        DB::table('inventaris')->where('inventaris_id', $id)->delete();

        return redirect('/inventaris');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $inventaris = DB::table('view_inventaris')
        ->Where('inventaris_id', 'LIKE', "%$keyword%")
        ->orWhere('user_nid', 'LIKE', "%$keyword%")
        ->orwhere('user_nama', 'LIKE', "%$keyword%")
        ->orWhere('id_perangkat', 'LIKE', "%$keyword%")
        ->orWhere('tgl_pinjam', 'LIKE', "%$keyword%")
        ->get();
    
    return view('index-inventaris', compact('inventaris'));
    }

    public function searchLog(Request $request)
{
    $keyword = $request->input('keyword');
    $logs = DB::table('view_log')
        ->Where('log_id', 'LIKE', "%$keyword%")
        ->orWhere('user_nid', 'LIKE', "%$keyword%")
        ->orWhere('user_nama', 'LIKE', "%$keyword%")
        ->orWhere('id_perangkat', 'LIKE', "%$keyword%")
        ->orWhere('tgl_pinjam', 'LIKE', "%$keyword%")
        ->orWhere('tgl_kembali', 'LIKE', "%$keyword%")
        ->orWhere('keterangan', 'LIKE', "%$keyword%")
        ->get();
    
    // Retrieve $id_perangkat from the first log entry
    $id_perangkat = $logs->isEmpty() ? null : $logs[0]->id_perangkat;

    return view('index-log', compact('logs', 'id_perangkat'));
}

}
