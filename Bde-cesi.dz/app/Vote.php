<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //

    public function utilisateur(){
        return $this->belongsTo('App\User');
    }

    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }


}
