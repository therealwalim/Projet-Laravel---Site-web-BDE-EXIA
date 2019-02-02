<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    //
    protected $fillable = [
        'nom','image', 'date', 'description', 'status','type','signal_eve','publie'
    ];


    public function commentaires(){
        return $this->hasMany('App\Commentaire');
    }

    public function jaimes(){
        return $this->hasMany('App\Jaime');
    }

    public function inscriptions(){
        return $this->hasMany('App\Inscription');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }

    public function Photos_evenements(){
        return $this->hasMany('App\Photos_evenement');
    }

}
