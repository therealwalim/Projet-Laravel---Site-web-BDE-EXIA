<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos_evenement extends Model
{
    protected $fillable = [
        'id','path', 'id_utilisateur', 'id_evenement'
    ];

    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }

}
