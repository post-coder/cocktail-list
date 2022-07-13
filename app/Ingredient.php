<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function cocktails() {
        return $this->belongsToMany('App\Cocktail');
    }
}
