<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FungsiController extends Controller
{
    public function index()
    {
        $fungsi = DB::table('view_fungsi')->get();
        return view('index-fungsi',['fungsi' => $fungsi]);
    }

    public function tambah_fungsi()
    {
    
        // memanggil view tambah
        $unit = DB::table('unit')->get();
        return view('tambah-fungsi',['unit' => $unit]);
    
    }

    public function store(Request $request)
    {
        // Validasi data
        Session::flash('fungsi_name', $request->fungsi_name);
        Session::flash('unit_id', $request->unit_id);

        $this->validate($request, [
            'fungsi_name' => 'required',
            'unit_id' => 'required',
        ],[
			'fungsi_name.required' => 'Nama Fungsi wajib diisi',
            'unit_id.required' => 'Unit wajib diisi',
		]);

        DB::table('fungsi')->insert([
            'unit_id' => $request->unit_id,
            'fungsi_name' => $request->fungsi_name
        ]);

        return redirect('/fungsi');
    
    }
    
    public function edit($id)
    {
		//ambil data dari table view_fungsi
        $fungsi = DB::table('view_fungsi')->where('fungsi_id',$id)->get();
		
		//ambil data dari table unit
        $unit = DB::table('unit')->get();
		
        return view('edit-fungsi',['fungsi' => $fungsi], ['unit' => $unit]);
    
    }

    public function update(Request $request)
    {
        DB::table('fungsi')->where('fungsi_id',$request->fungsi_id)->update([
            'fungsi_name' => $request->fungsi_name,
            'unit_id' => $request->unit_id,
        ]);
       return redirect('/fungsi');
    }

    public function hapus($id)
    {
        $fungsi_name = DB::table('fungsi')->where('fungsi_id', $id)->value('fungsi_name');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-fungsi', ['id' => $id, 'fungsi_name' => $fungsi_name]);
    }

    public function hapusConfirm($id)
    {
        DB::table('fungsi')->where('fungsi_id', $id)->delete();
        // Alihkan kembali ke halaman utama
        return redirect('/fungsi');
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $fungsi = DB::table('view_fungsi')
        ->Where('fungsi_id', 'LIKE', "%$keyword%")
        ->orWhere('fungsi_name', 'LIKE', "%$keyword%")
        ->orWhere('unit_name', 'LIKE', "%$keyword%")
        ->get();
    
    return view('index-fungsi', compact('fungsi'));
    }
}
