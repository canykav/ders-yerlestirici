<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\GunRequest;
use App\Models\Gun;
use App\Models\Saat;

class GunController extends Controller
{
    public function index()
    {
        if(gun::count()==0){
            return response()->noContent();
        } else {
            $gunler = gun::get();
            return response()->json($gunler);
        }
    }

    public function store(GunRequest $req)
    {
        if(is_array($req->gun)) {
            foreach($req->gun as $gun => $bool) {
                if($bool==true) {
                    $data['gun'] = $gun;
                    gun::create($data);
                }
            }
        } 
        else {
            gun::create($req->all());
        }
    }

    public function show(Request $req)
    {
        //
    }

    public function update(Request $req, Dashboard $dashboard)
    {
        //
    }

    public function destroy(Request $req)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        gun::truncate();
        saat::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
