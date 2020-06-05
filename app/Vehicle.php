<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //

    protected $fillable = [
        'brand', 'model', 'color', 'icnum', 'license', 'platenumber', 'state',
    ];

    public function staff(){
        return $this->belongsTo('App\User');
    }

    public function attendance(){
        return $this->hasMany('App\Attendance');
    }
}
