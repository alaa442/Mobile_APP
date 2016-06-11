<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
	// public $table ="gpss";

    public function getusers()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
