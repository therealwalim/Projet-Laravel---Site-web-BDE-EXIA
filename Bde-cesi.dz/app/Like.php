<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'id_utilisateur', 'likable_id','likable_type','post_id'
    ];

    public function utilisateur(){
        return $this->belongsTo('App\User');
    }

    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }
        
}
