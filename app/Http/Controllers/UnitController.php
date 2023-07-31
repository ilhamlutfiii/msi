<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
    	// mengambil data dari table unit
    	$unit = DB::table('unit')->get();
 
    	// mengirim data unit ke view index
    	return view('index-unit',['unit' => $unit]);
 
    }
	// method untuk menampilkan view form tambah unit
	public function tambah_unit()
	{
	 
		// memanggil view tambah
		return view('tambah_unit');
	 
	}
	
	// method untuk insert data ke table unit
	public function store_unit(Request $request)
	{
		// insert data ke table unit
		DB::table('unit')->insert([
			'unit_name' => $request->unit_name
		]);
		// alihkan halaman ke halaman unit
		return redirect('/unit');
	 
	}
	
	public function edit($id)
	{
	$unit = DB::table('unit')->where('unit_id',$id)->get();
	return view('edit-unit',['unit' => $unit]);
 
	}

	public function update(Request $request)
	{
	DB::table('unit')->where('unit_id',$request->id)->update([
		'unit_name' => $request->nama,
	]);
	return redirect('/unit');
	 }

	 public function hapus($id)
    {
        $unit_name = DB::table('unit')->where('unit_id', $id)->value('unit_name');
        // Menampilkan halaman konfirmasi hapus
        return view('hapus-unit', ['id' => $id, 'unit_name' => $unit_name]);
    }
 
	 public function hapusConfirm($id)
	 {
		 DB::table('unit')->where('unit_id', $id)->delete();
		 // Alihkan kembali ke halaman utama
		 return redirect('/unit');
	 }

}
