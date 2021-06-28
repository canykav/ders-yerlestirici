<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolum extends Model
{
    use HasFactory;

    protected $table = 'bolumler';

    protected $primaryKey ='id';

    protected $fillable = [
        'ad',
        'ogretim',
    ];

    public $timestamps = false;
}