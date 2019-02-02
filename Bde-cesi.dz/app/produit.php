<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable = [
        'nom', 'description', 'prix', 'nmbrvendu', 'categorie', 'stock','image'
    ];


    public function commande(){
        return $this->belongsToMany('App\Commande', 'commande_produit');
    }

}
