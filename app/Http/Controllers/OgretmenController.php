<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OgretmenRequest;
use App\Models\Ogretmen;

class OgretmenController extends Controller
{
    public function index()
    {
        $ogretmenler = ogretmen::get();
        return response()->json(['status' => 'success','data' => $ogretmenler]);
    }

    public function store(OgretmenRequest $req)
    {
        ogretmen::create($req->all());
    }

    public function show(Request $req, $ogretmen_id)
    {
        $ogretmen = ogretmen::findOrFail($ogretmen_id);
        $ogretmen->dersler;
        $ogretmen['toplam_saat'] = $ogretmen->getToplamSaat();
        return response()->json(['status' => 'success','data' => $ogretmen]);
    }

    public function update(Request $req)
    {
        //
    }

    public function destroy($ogretmen_id)
    {
        ogretmen::findOrFail($ogretmen_id)->delete();
    }
}
