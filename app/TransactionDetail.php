<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public $timestamps=false;

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function flower(){
        return $this->belongsTo(Flower::class);
    }
}
