<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    Protected $table = 'products';
    Protected $primaryKey = 'ProductID';
    public $timestamps = false;       
}
