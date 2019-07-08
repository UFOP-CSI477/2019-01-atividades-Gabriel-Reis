<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Estado extends Model
{
    //Lita dos comapos que podem ser gravados no BD
	protected $fillable = ['nome','sigla'];

    //Lista de campos que devem ser protegidos
    // protected $guarded = ['senha'];

	//1 para N -> cidades
    public function cidades(){
    	return $this->hasMany('App\Cidade');
    }
}