<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $dates = ['fecha'];

    public function piloto()
    {
        return $this->belongsTo(Piloto::class);
    }

    public function pasajes()
    {
        return $this->hasMany(Pasaje::class);
    }
}
