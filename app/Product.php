<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function catigory()
  {
      return $this->belongsTo('App\Catigory');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function brand()
  {
    return $this->belongsTo('App\Brand');
  }

  public function location()
  {
    return $this->belongsTo('App\cities');
  }

}
