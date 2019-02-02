<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    //

    protected $fillable = [
        'id_commande','id_produit','Quantite_Pro',
    ];

     public function commande()
{
    return $this->belongsTo('App\Commande');
}

    public function produit()
{
    return $this->belongsTo('App\produit');
}

}
