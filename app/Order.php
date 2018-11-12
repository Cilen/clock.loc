<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = ['client_first_name','client_last_name','phone','city','warehous','delivery_method','pay_method','total_price','revised'];

    public function confirmedCart(){
        return $this->hasMany('App\ConfirmedCart', 'order_id');
    }
}
