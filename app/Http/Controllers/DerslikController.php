<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DerslikRequest;
use App\Models\Derslik;

class DerslikController extends Controller
{
    public function index()
    {
        $derslikler = derslik::get();
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

    public function update(Request $req)
    {
        //
    }

    public function destroy(Request $req)
    {
        derslik::find($req->id)->delete();
    }
}
