<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $home = DB::table('view_user')->get();
		
        return view('home',['home' => $home]);
    }
}
