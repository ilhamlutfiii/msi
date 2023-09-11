<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $home = DB::table('view_pinjam')->get();
        $countPinjaman = DB::table('view_pinjam')->count();
        $countInventaris = DB::table('view_inventaris')->count();
		
        return view('home', ['home' => $home, 'countPinjaman' => $countPinjaman, 'countInventaris' => $countInventaris]);
    }
}
