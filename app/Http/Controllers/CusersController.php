<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class CusersController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');
    }
   
    public function getUsers()
    {
      $users = User::all();
      return view('adminp.users', compact('users'));
    }

    public function postDelCat(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
