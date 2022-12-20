<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Piloto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
    protected $dates = ['f_nacimiento'];


    public function vuelos()
    {
        return $this->hasMany(Vuelo::class);
    }

    public function getEdadAttribute()
{
    if ($this->f_nacimiento)
        return Carbon::parse($this->f_nacimiento)->age;
    else
        return 'Desconocido';
}
}
