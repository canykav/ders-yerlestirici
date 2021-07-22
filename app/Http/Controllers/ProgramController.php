<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;
use App\Models\gun;
use App\Models\saat;
use App\Models\ders;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function store(request $req)
    {
        if ($req->automatic==1) {
            program::truncate();
            $dersler = ders::all();
            $saatler = saat::orderBy('gun')->orderBy('baslangic')->get();
            foreach($dersler as $ders) {
                for($j=1;$j<$ders->teorik;$j++){ // teorik ders saati sayısı kadar döngü
                    for($i=0;$i<count($saatler);$i++) { // dersi bir saate yerleştirebilmek için saatler döngüsü
                        $ders_saati = program::where([['ders',$ders->id],['derslik',$ders->teorik_derslik]]);
                        $derslik_doluluk = program::where([['saat',$saatler[$i]['id']],['derslik',$ders->teorik_derslik]]);
                        $bolum_doluluk = program::leftjoin('dersler','program.ders','=','dersler.id')->where([['program.saat',$saatler[$i]['id']],['dersler.bolum',$ders->bolum]]);
                        $ogretmen_doluluk = program::leftjoin('dersler','program.ders','=','dersler.id')->where([['program.saat',$saatler[$i]['id']],['dersler.ogretmen',$ders->ogretmen]]);
                        if($ders_saati->count()<$ders->teorik && !$derslik_doluluk->exists() && !$bolum_doluluk->exists() && !$ogretmen_doluluk->exists()) { // ders sayisi kontrolu ve dersliğin, bölümün müsaitlik kontrolü
                            program::create([
                                'saat' => $saatler[$i]['id'],
                                'ders' => $ders->id,
                                'ogretmen' => $ders->ogretmen,
                                'derslik' => $ders->teorik_derslik
                            ]);
                        } else {
                            continue;
                        }
                    }
                }
            }
        }
    }

    public function show(Request $req, $program)
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
