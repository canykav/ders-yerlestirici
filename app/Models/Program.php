<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';

    protected $primaryKey ='id';

    protected $fillable = [
        'saat',
        'ders',
        'ogretmen',
        'derslik'
    ];

    public $timestamps = false;

    public function ders()
    {
        return $this->hasOne(ders::class, 'id', 'ders');
    }
    public function ogretmen()
    {
        return $this->hasOne(ogretmen::class, 'id', 'ogretmen');
    }
    public function derslik()
    {
        return $this->hasOne(derslik::class, 'id', 'derslik');
    }
}
