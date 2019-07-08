<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procedures extends Model
{
    protected $fillable = ['name','price','user_id'];
}
