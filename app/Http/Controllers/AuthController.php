<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use App\User;

// dont forget the middleware


class AuthController extends Controller
{

    public function __construct()
    {
      return $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
      return view('auth.register');
    }

    public function getForget()
    {
      return view('auth.forget');
    }

    public function postRegister(Request $request)
    {
      // validate the data
      $this->validate( $request, [

        'username' => 'required|min:5|max:20|unique:users',
        'password' => 'required|min:5|max:40|confirmed',
        'password_confirmation' => 'required',
        'email'    => 'required|unique:users',
        'gender'   => 'required|max:1|numeric',
        'fullname' => 'required|min:3|max:20'
      ]);

      // create a new user
      $user = new User();
      $user->username = $request['username'];
      $user->password = bcrypt($request['password']);
      $user->email    = $request['email'];
      $user->gender   = $request['gender'];
      $user->fullname = $request['fullname'];
      $user->save();


      // redirect
      return redirect()->route('login')->with('message', 'Your account has been created!.');

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
          'username' => 'required',
          'password' => 'required'
        ]);
        // recive login info from the user
        $username = $request['username'];
        $password = $request['password'];

        // check it
        if (Auth::attempt(['username' => $username, 'password' => $password ]))
        {
            return redirect()->to('/');
        }

        // flash message with error in sign n
        return redirect()->back()->with('message', 'username or password is incorrect.');
    }

    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('login');
    }
}
