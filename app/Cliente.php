<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    Protected $table = 'customers';
    Protected $primaryKey = 'CustomerID';
    public $timestamps = false;
}
