<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saat extends Model
{
    use HasFactory;

    //CONST GUNLER = ['Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi','Pazar'];

    protected $table = 'saatler';

    protected $primaryKey ='id';

    protected $fillable = [
        'gun',
        'baslangic',
        'bitis',
        'ogretim'
    ];
    public $timestamps = false;
}
