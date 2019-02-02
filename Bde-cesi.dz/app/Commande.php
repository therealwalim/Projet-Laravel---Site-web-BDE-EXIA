<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //
    protected $fillable = [
        'user_id','etat'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function produit(){
        return $this->belongsToMany('App\Produit', 'commande_produit');
    }
    
}
