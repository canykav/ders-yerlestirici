<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BolumRequest;
use App\Models\Bolum;

class BolumController extends Controller
{
    public function index()
    {
        $bolumler = bolum::get();
        return response()->json(['status' => 'success','data' => $bolumler]);
    }

    public function store(BolumRequest $req)
    {
        bolum::create($req->all());
    }

    public function show(Request $req)
    {
        //
    }

    public function update(Request $req, $bolum_id)
    {
        bolum::findOrFail($bolum_id)->update($req->all());
    }

    public function destroy($bolum_id)
    {
        bolum::findorFail($bolum_id)->delete();
    }
}
