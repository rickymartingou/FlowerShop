<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    public $timestamps=false;

    public function flowerType(){
        return $this->belongsTo(FlowerType::class);
    }

    public function detail(){
        return $this->hasOne(CartDetail::class);
    }

    public function transaction(){
        return $this->hasOne(TransactionDetail::class);
    }
}
