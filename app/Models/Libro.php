<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
    protected $dates = ['f_publicacion'];

    public function getMesAttribute()
    {
        //setlocale(LC_ALL, 'es_ES');
        $meses = ["01" => "Enero","02" =>"Febrero","03" =>"Marzo","04" =>"Abril","05" =>"Mayo","06" =>"Junio","07" =>"Julio","08" =>"Agosto","09" =>"Septiembre","10" =>"Octubre","11" =>"Noviembre","12" =>"Diciembre"];
        //$this->f_nacimiento;
        $mes = explode("-", $this->f_publicacion)[1];
    
        return "{$meses[$mes]}";
    }
}
