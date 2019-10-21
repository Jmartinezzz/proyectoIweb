<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    Protected $table = 'suppliers';
    Protected $primaryKey = 'SupplierID';
    public $timestamps = false;
}
