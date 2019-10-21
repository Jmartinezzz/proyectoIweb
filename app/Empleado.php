<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    Protected $table = 'employees';
    Protected $primaryKey = 'EmployeeID';
    public $timestamps = false;
}
