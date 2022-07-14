<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    protected $fillable = [
        'name',
        'image',
        'istructions'
    ];

    public function ingredients() {
        return $this->belongsToMany('App\Ingredient');
    }
}
