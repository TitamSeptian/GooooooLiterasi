<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Buku;
use App\User;
use App\Jenis;
use App\Kategori;

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
        // Request Bulan ini
        $bulan = date('m');
        $tahun = date('o');
        $hari_ini = date('j');
        $req = DB::table('requests')->whereMonth('created_at', $bulan)->count();

        // Request Tahun ini
        $req2 = DB::table('requests')->whereYear('created_at', $tahun)->count();

        $req3 = DB::table('requests')->whereDay('created_at', $hari_ini)->count();

        $buku_hari_ini = DB::table('bukus')->whereDay('created_at', $hari_ini)->count();

        $buku = Buku::all()->count();

        $user = User::all()->count();
        $user_hari_ini = DB::table('users')->whereDay('created_at', $hari_ini)->count();

        $jenis = Jenis::all()->count();
        $kategori = Kategori::all()->count();

        // dd($buku);
        // dd($req2);
        return view('pages.side',[
            'tahun' => $req2,
            'bulan' => $req,
            'hari_ini' => $req3,
            'buku_hari_ini' => $buku_hari_ini,
            'buku' => $buku,
            'user' => $user,
            'user_hari_ini' => $user_hari_ini,
            'jenis' => $jenis,
            'kategori' => $kategori,
        ]);
    }
}
