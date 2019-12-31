<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    public $timestamps=false;
    protected $fillable=['quantity'];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function flower(){
        return $this->belongsTo(Flower::class);
    }
}
