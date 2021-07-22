<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\SaatRequest;
use App\Models\gun;
use App\Models\saat;

class SaatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $saatler = saat::distinct('baslangic')->orderBy('baslangic')->get(['baslangic','bitis']);
        $gunler = gun::get();
        foreach($saatler as $saat) {
            for($i=0;$i<count($gunler);$i++) {
                $saat[$i]=0;
                $query = saat::where([
                    ['baslangic', '=', $saat['baslangic']],
                    ['bitis', '=', $saat['bitis']],
                    ['gun', '=', $gunler[$i]['id']]
                ]);
                if(($query)->exists()){
                    $saat[$i] = $query->first()->id;
                }
            }
        }
        return response()->json(['status' => 'success', 'data' => $saatler]);
    }

    public function store(SaatRequest $req)
    {
        $data = $req->all();
        $gunler = gun::get();
        if(is_object($gunler)) {
            foreach($gunler as $gun) {
                $data['gun'] = $gun['id'];
                saat::create($data);
            }
        }
        else {
            saat::create($req->all());
        }
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
        //
    }
}
