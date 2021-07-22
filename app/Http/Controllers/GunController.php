<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\GunRequest;
use App\Models\Gun;
use App\Models\Saat;
use App\Models\Program;

class GunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function update(Request $req)
    {
        //
    }

    public function destroy()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        gun::truncate();
        saat::truncate();
        program::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
