<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderdetails()
    {
      return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function address()
    {
      return $this->belongsTo('App\Address');
    }



}
