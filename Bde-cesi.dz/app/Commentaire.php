<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //
    protected $fillable = [
        'id','contenu','id_utilisateur','evenement_id','signal_com'
    ]; 


public function utilisateurs(){
    return $this->belongsTo('App\User');
}

public function evenement(){
    return $this->belongsTo('App\Evenement');
}

public function user(){
    return $this->belongsTo('App\User');
}

public function jaimes(){
    return $this->hasMany('App\Jaime', 'evenement_id' , 'id');
}

}
