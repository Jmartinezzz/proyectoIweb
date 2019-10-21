<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    Protected $table = 'entradas';
    Protected $primaryKey = 'idEntrada';
    public $timestamps = false;
}
