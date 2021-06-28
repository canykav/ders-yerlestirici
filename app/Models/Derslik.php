<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Derslik extends Model
{
    use HasFactory;

    protected $table = 'derslikler';

    protected $primaryKey ='id';

    protected $fillable = [
        'ad',
        'tur',
    ];

    public $timestamps = false;
}
