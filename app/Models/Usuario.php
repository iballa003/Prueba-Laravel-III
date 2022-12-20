<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Usuario extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $dates = ['f_nacimiento'];

    public function getEdadAttribute()
{
    if ($this->f_nacimiento)
        return Carbon::parse($this->f_nacimiento)->age;
    else
        return 'Desconocido';
}

public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }


}
