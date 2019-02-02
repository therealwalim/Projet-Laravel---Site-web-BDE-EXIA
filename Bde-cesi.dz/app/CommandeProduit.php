<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    //

    protected $fillable = [
        'id_commande','id_produit','Quantite_Pro',
    ];

     public function commande()
{
    return $this->belongsTo('App\commande');
}

    public function produit()
{
    return $this->belongsTo('App\produit');
} 

}
