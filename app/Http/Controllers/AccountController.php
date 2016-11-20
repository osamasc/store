<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


use App\CartItem;

use App\Order;

use App\Wishlist;

use App\Address;

use App\User;

use App\Cart;

use Hash;


class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        if (Auth::check()){

            $cart = Cart::where('user_id',Auth::user()->id)->first();

            if(!$cart)
            {
                $cart =  new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->save();
            }

            $cartCount = CartItem::where('cart_id', Auth::User()->cart->id)->count();
            $user = Auth::user();
            View::share('cartCount', $cartCount);
            View::share('user', $user);
        }
    }


    public function getMyOrders() // orders
    {

       $orders = Order::where('user_id', Auth::user()->id)->get();
       return view('account.orders', compact('user', 'orders'));
    }

    public function getMyaddresses() // shipping addresses
    {
       return view('account.shipping-addresses');
    }

    public function getMyLists() // wishing lists
    {
       return view('account.lists');

    }

    public function removeListItem($id) // remove single item from wish list
    {
      $item = Wishlist::find($id);
      if(auth::user()->id != $item->user_id){ redirect()->back();}
      $item->delete();
      notify()->flash('The Item Removed Successfully ', 'success', [
          'timer' => 2000
      ]);

      return redirect()->back();
    }

    public function getMySettings() // settings
    {
       return view('account.settings');
    }

    public function getNewAddress() // new address page
    {
      $user = Auth::user();
      return view('account.address-create', compact('user'));
    }

    public function postNewAdd(Request $request) // post a new address
    {
        $this->validate($request, [
          'firstname' => 'required|max:20',
          'lastname' => 'required|max:20',
          'phone'    => 'required|numeric|min:2',
          'country'  => 'required|max:20',
          'city'     => 'required|max:20',
          'street'   => 'required|max:50'
        ]);

        $address = new Address();
        $address->user_id   = auth::user()->id;
        $address->firstname = $request['firstname'];
        $address->lastname  = $request['lastname'];
        $address->phone     = $request['phone'];
        $address->country   = $request['country'];
        $address->city      = $request['city'];
        $address->street    = $request['street'];
        $address->save();

        if($address->id)
        {
          $user = User::find(Auth::user()->id);
          $user->address_id = $address->id;
          $user->save();


          notify()->flash('Your Address Just Updated Successfully ', 'success', [
              'timer' => 2000
            ]);

          return redirect()->route('addresses');
        };

    }

    public function getDeleteAdd($id) // remove an adrress
    {
        $address = Address::find($id);

        if(auth::user()->id != $address->user_id){ redirect()->back();}

        $address->delete();
        notify()->flash('The Address Removed Successfully ', 'success', [
            'timer' => 2000
          ]);

        return redirect()->route('addresses');
    }

    public function getEditAdd($id) // edit address
    {
        $address = Address::find($id);

        if(auth::user()->id != $address->user_id){redirect()->back();}
        return view('account.address-edit', compact('address'));
    }

    public function postEditedAdd(Request $request,  $id ) // post edited address
    {
        $this->validate($request, [
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'phone'    => 'required|numeric|min:2',
            'country'  => 'required|max:20',
            'city'     => 'required|max:20',
            'street'   => 'required|max:50'
        ]);

        $address = Address::find($id);
        $address->firstname = $request['firstname'];
        $address->lastname  = $request['lastname'];
        $address->phone     = $request['phone'];
        $address->country   = $request['country'];
        $address->city      = $request['city'];
        $address->street    = $request['street'];

        if(auth::user()->id != $address->user_id){ redirect()->back();}

        $address->update();

        notify()->flash('The Address Just Updated Successfully ', 'success', [
            'timer' => 2000
          ]);

        return redirect()->route('addresses');
    }

    public function postPrimary($id) // select primary address
    {
        $user = Auth::user();
        $address = Address::where('id', $id)->first();

        if($user->id != $address->user_id){ redirect()->back();}

        $user->address_id = $address->id;
        $user->save();


        notify()->flash('Primary Address Updated Successfully', 'success', [
            'timer' => 2000
          ]);

        return redirect()->back();
    }

    public function updateInfo(Request $request)
    {   

        $this->validate($request, [
          'fullname' => 'required',
          'email'    => 'required',
          'gender'   => 'required'
        ]);

        $user = User::find(Auth::user()->id);
        $user->fullname = $request->fullname;
        $user->email    = $request->email;
        $user->gender   = $request->gender;
        $user->update();

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
          'oldpassword'                 => 'required',
          'newpassword'                 => 'required|confirmed',
          'newpassword_confirmation'    => 'required'
        ]);

        $oldpassword  = $request->oldpassword;
        $password     = bcrypt($request->newpassword);

        if (Hash::check($oldpassword, Auth::user()->password)){


            $user = Auth::user();
            $user->password = $password;
            $user->update();

            notify()->flash('Password Successfully Updated', 'success', [
              'timer' => 2000
            ]);
           
            return redirect()->back();
        } else {

            notify()->flash('Info is incorrect', 'error', [
              'timer' => 2000
            ]);

            return redirect()->back();

        }

    }
}
