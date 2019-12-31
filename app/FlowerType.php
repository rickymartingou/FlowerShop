<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlowerType extends Model
{
    public $timestamps=false;

    public function flowers(){
        return $this->hasMany(Flower::class);
    }
}
