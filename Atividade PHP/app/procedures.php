<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procedures extends Model
{
    protected $fillable = ['name','price','user_id'];

    //Lista de campos que devem ser protegidos
    // protected $guarded = ['senha'];

	// //1 para N -> cidades
 //    public function cidades(){
 //    	return $this->hasMany('App\Cidade');
 //    }
}
