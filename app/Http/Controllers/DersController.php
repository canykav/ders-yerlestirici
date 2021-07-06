<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\DersRequest;
use App\Models\Ders;

class DersController extends Controller
{
    public function index(request $req)
    {
        if($req->bolum){
            $dersler = ders::where('bolum',$req->bolum)->get();  
        } else {
            $dersler = ders::get();  
        }
        foreach($dersler as $item) {
            $ders = ders::find($item['id']);
            $item['teorik_derslik_adi'] = ($item['teorik_derslik']) ? $ders->getTeorikDerslik->ad : null;
            $item['lab_derslik_adi'] = ($item['lab_derslik']) ? $ders->getLabDerslik->ad : null;
            $item['ogretmen_adi'] = ($item['ogretmen']) ? $ders->getOgretmen->ad : null;
        }
        return response()->json(['status' => 'success','data' => $dersler]);    
    }

    public function store(request $req)
    {
        ders::create($req->all());
    }

    public function show(Request $req)
    {
        //
    }

    public function update(Request $req)
    {
        //
    }

    public function destroy(Request $req)
    {
        ders::findOrFail($req->id)->delete();
    }
}
