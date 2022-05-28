<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Berita;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('siswa_dashboard');
    }
    public function adminHome()
    {
        $users = User::where('hak_akses','2')->count();
        return view('admin_dashboard',compact('users'));
    }

    // public function create()
    // {
    //     $databerita = Berita::all();
    //     return view ('admin_berita' , compact('databerita'));
    // }

   
    

}

