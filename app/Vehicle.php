<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //

    protected $fillable = [
        'brand', 'model', 'color', 'platenumber',
    ];

    public function staff(){
        return $this->belongsTo('App\User');
    }
}
