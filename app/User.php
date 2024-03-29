<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps=false;

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
