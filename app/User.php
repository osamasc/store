<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    protected $fillable = ['username','fullname', 'email', 'fullname', 'password', 'gender'];


    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function wishlists()
    {
      return $this->hasMany('App\Wishlist');
    }

    public function cart()
    {
      return $this->hasOne('App\Cart');
    }

    public function isAdmin()
    {
        $isAdmin = Auth::user()->is_admin;
        return $isAdmin;
    }

}
