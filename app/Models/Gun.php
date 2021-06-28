<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Saat;

class Gun extends Model
{
    use HasFactory;
    protected $table = 'gunler';

    protected $primaryKey ='id';

    protected $fillable = [
        'gun'
    ];

    public $timestamps = false;

    public function saatler()
    {
        return $this->hasMany(saat::class, 'gun', 'id');
    }
}
