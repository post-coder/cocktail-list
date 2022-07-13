<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    public function ingredients() {
        return $this->belongsToMany('App\Ingredient');
    }
}
