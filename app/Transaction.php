<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps=false;

    public function detail(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
