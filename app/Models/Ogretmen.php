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
        'ad',
        'toplam_saat',
        'uygun_saat',
    ];

    public $timestamps = false;
}
