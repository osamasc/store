<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Catigory;

class CatigoriesController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('admin');
    }

    public function getCatigories()
    {
      $catigories = Catigory::all();
      return view('adminp.catigories', compact('catigories'));
    }

    public function postNewCat(Request $request)
    {
      $this->validate($request, [
        'catigory_name' => 'required'
      ]);

      $name = $request['catigory_name'];
      $cat = new Catigory();
      $cat->catigory_name = $name;
      $cat->save();
      return redirect()->back();
    }

    public function postDelCat(Catigory $catigory)
    {
      $catigory->delete();
      return redirect()->back();
    }
}
