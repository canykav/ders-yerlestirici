<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ders extends Model
{
    use HasFactory;

    protected $table = 'dersler';

    protected $primaryKey ='id';

    protected $fillable = [
        'kod',
        'ad',
        'bolum',
        'teorik',
        'lab',
        'teorik_derslik',
        'lab_derslik'
    ];

    public $timestamps = false;

    public function bolum()
    {
        return $this->hasOne(bolum::class, 'id', 'bolum');
    }
}
