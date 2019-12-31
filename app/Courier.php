<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public $timestamps=false;

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
