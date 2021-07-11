<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;
use App\Models\gun;
use App\Models\saat;

class ProgramController extends Controller
{
    public function index(request $req)
    {
        /* 
        gelen filtreye gore ilgili kategoride id ile arama yapilir.
        kullanim: request olarak filtre ve id gonderin.
        ornegin: ogretmenin ders programi isteniyorsa filtre: ogretmen, id: ogretmenin id'si.
        */
        $gunler = gun::get();
        $saatler = saat::distinct('baslangic')->orderBy('baslangic')->get(['baslangic','bitis']);
        foreach($saatler as $saat) {
            for($i=0;$i<count($gunler);$i++) {
                $saat[$i]=0;
                $query = saat::where([
                    ['baslangic', '=', $saat['baslangic']],
                    ['bitis', '=', $saat['bitis']],
                    ['gun', '=', $gunler[$i]['id']]
                ]);
                if($query->exists()){
                    $saat[$i] = (object) array('saat' => $query->first()->id);
                    switch ($req->filter) {
                        case 'ogretmen':
                        $program = program::where([['ogretmen',$req->id],['saat', $query->first()->id]]);
                        break;
                        case 'bolum':
                        $program = program::where([['dersler.bolum',$req->id],['program.saat', $query->first()->id]])
                            ->leftjoin('dersler','program.ders','=','dersler.id')
                            ->select('program.*','dersler.bolum');
                        break;
                        case 'ders':
                        $program = program::where([['ders',$req->id],['saat', $query->first()->id]]);
                        case 'derslik':
                        $program = program::where([['derslik',$req->id],['saat', $query->first()->id]]);
                        break;
                        default:
                        // filtre gonderilmedigi icin cevap yok
                    }
                    if($program->exists()){
                        $saat[$i] = $program->with('ders','ogretmen','derslik')->first();
                    }
                }
            }          
        }
        $data['saatler'] = $saatler;
        $data['gunler'] = $gunler;
        return response()->json(['status' => 'success','data' => $data]);
    }

    public function store(OgretmenRequest $req)
    {
       //
    }

    public function show(Request $req, $id)
    {
        //
    }

    public function update(Request $req)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
