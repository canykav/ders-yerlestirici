<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogretmen extends Model
{
    use HasFactory;

    protected $table = 'ogretmenler';

    protected $primaryKey ='id';

    protected $fillable = [
        'ad'
    ];

    public $timestamps = false;

    public function dersler()
    {
        return $this->hasMany(ders::class, 'ogretmen', 'id');
    }
    public function getToplamSaat() {
        return $this->dersler->sum('teorik') + $this->dersler->sum('lab');
    }
}
