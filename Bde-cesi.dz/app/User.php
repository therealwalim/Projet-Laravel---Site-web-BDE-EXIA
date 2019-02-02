<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom', 'email', 'password','loalisation','type','type_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likes(){
        return $this->hasMany('App\Like');
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

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    
    public function commentaires(){
        return $this->hasMany('App\Commentaire');
    }
}
