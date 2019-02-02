<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }
}
