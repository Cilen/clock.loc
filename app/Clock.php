<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clock extends Model
{
    protected $primaryKey = 'clock_id';
    protected $fillable = ['name','gender','type_of_indexation', 'type_of_mechanism', 'producer','price','old_price','availability','hide'];

    public function descriptions(){
        return $this->hasMany('App\Description', 'clock_id');
    }

    public function characteristics(){
        return $this->hasMany('App\Description', 'clock_id');
    }
}
