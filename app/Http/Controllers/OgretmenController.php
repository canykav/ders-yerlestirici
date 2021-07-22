<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OgretmenRequest;
use App\Models\Ogretmen;
use App\Models\ders;
use Illuminate\Support\Facades\DB;

class OgretmenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ogretmenler = ogretmen::get();
        return response()->json(['status' => 'success','data' => $ogretmenler]);
    }

    public function store(OgretmenRequest $req)
    {
        ogretmen::create($req->all());
    }

    public function show(Request $req, $ogretmen)
    {
        $ogr = ogretmen::findOrFail($ogretmen);
        $ogr->dersler;
        $ogr['toplam_saat'] = $ogr->getToplamSaat();
        return response()->json(['status' => 'success','data' => $ogr]);
    }

    public function update(Request $req)
    {
        //
    }

    public function destroy($ogretmen)
    {
            ogretmen::findOrFail($ogretmen)->delete();
    }
}
