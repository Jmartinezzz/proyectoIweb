<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    Protected $table = 'orders';
    Protected $primaryKey = 'OrderID';
    public $timestamps = false;
}
