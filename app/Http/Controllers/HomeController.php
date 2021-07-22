<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

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
        return view('home');
    }

    public function stats() {
        $data = new stdClass;
        $data->gun_sayisi = DB::table('gunler')->count();
        $data->ogretmen_sayisi = DB::table('ogretmenler')->count();
        $data->bolum_sayisi = DB::table('bolumler')->count();
        $data->ders_sayisi = DB::table('dersler')->count();
        $data->derslik_sayisi = DB::table('derslikler')->count();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
}
