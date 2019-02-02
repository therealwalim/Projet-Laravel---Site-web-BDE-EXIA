<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    //
	protected $fillable = [
        'nom'
    ]; 





    protected $table = 'categories_produits';

    protected $primaryKey = 'id';


	public function produits()
    {
        return $this->hasMany('App\produit','categorie');
    }


}
