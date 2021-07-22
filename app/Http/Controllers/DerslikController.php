<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DerslikRequest;
use App\Models\Derslik;

class DerslikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(request $req)
    {
        if($req->seperate==1){
            $derslikler['sinif'] = derslik::where('tur','Sınıf')->get();
            $derslikler['laboratuvar'] = derslik::where('tur','Laboratuvar')->get();
        } else {
            $derslikler = derslik::orderBy('ad')->get();
        }
        return response()->json(['status' => 'success','data' => $derslikler]);
    }

    public function store(DerslikRequest $req)
    {
        derslik::create($req->all());
    }

    public function show(Request $req)
    {
        //
    }

    public function update($derslik, Request $req)
    {
        derslik::findOrFail($derslik)->update($req->all());
    }

    public function destroy($derslik, Request $req)
    {
        derslik::findOrFail($derslik)->delete();
    }
}
