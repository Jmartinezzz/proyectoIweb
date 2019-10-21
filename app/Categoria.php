<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    Protected $table = 'categories';
    Protected $primaryKey = 'CategoryID';
    public $timestamps = false;

    public function scopeName($query, $name)
    {
    	if ($name) {
    		return $query->where('CategoryName','LIKE',"%$name%");
    	}
    }
}
