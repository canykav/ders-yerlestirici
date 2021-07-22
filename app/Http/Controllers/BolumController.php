<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BolumRequest;
use App\Models\Bolum;

class BolumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function update(Request $req, $bolum)
    {
        bolum::findOrFail($bolum)->update($req->all());
    }

    public function destroy($bolum)
    {
        bolum::findorFail($bolum)->delete();
    }
}
