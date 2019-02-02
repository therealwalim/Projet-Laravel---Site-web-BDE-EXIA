<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaime extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }
    public function commentaire(){
        return $this->belongsTo('App\Commentaire');
    }
}
