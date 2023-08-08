<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = DB::table('view_inventaris')->get();
        return view('index-inventaris', ['inventaris' => $inventaris]);
    }

    public function tambah_inventaris()
    {
        $users = DB::table('user')->get();
        $komputers = DB::table('komputer')->get();
        return view('tambah-inventaris', ['users' => $users, 'komputers' => $komputers]);
    }

    public function store(Request $request)
    {
        $noTiket = substr($request->no_tiket, 2);
        DB::table('inventaris')->insert([
            'user_id' => $request->user_id,
            'id_perangkat' => $request->id_perangkat,
            'tgl_pinjam' => $request->tgl_pinjam,
            'no_tiket' => $noTiket
        ]);

        return redirect('/inventaris');
    }

    public function detail($id)
    {
        $inventaris = DB::table('view_inventaris')->where('inventaris_id', $id)->get();
        $users = DB::table('user')->get();
        $komputers = DB::table('komputer')->get();

        return view('detail-inventaris', [
            'inventaris' => $inventaris,
            'users' => $users,
            'komputers' => $komputers
        ]);
    }

    public function log($idPerangkat)
    {
        $logs = DB::table('view_log')->where('id_perangkat', $idPerangkat)->get();
        $users = DB::table('user')->get();
        $komputers = DB::table('komputer')->get();

        return view('index-log', [
            'logs' => $logs,
            'users' => $users,
            'id_perangkat' => $idPerangkat
        ]);
    }

    public function edit($id)
    {
        $inventaris = DB::table('view_inventaris')->where('inventaris_id', $id)->get();
        $users = DB::table('user')->get();
        $komputers = DB::table('komputer')->get();

        return view('edit-inventaris', [
            'inventaris' => $inventaris,
            'users' => $users,
            'komputers' => $komputers
        ]);
    }

    public function update(Request $request)
    {
        $noTiket = substr($request->no_tiket, 2);
        DB::table('inventaris')->where('inventaris_id', $request->inventaris_id)->update([
            'user_id' => $request->user_id,
            'id_perangkat' => $request->id_perangkat,
            'tgl_pinjam' => $request->tgl_pinjam,
            'no_tiket' => $noTiket
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
        $noTiket = substr($request->no_tiket, 2);
        DB::table('log')->insert([
            'user_id' => $request->user_id,
            'id_perangkat' => $request->id_perangkat,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'no_tiket' => $noTiket,
            'keterangan' => $request->keterangan
        ]);
        
        DB::table('inventaris')->where('inventaris_id', $id)->delete();

        return redirect('/inventaris')->with('success', 'Log berhasil diposting dan inventaris berhasil dihapus.');
    }
}
