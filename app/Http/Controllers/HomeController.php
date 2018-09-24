<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lang;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  { 
    $locale = Lang::all();
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $id = auth()->user()->id;
    $user = User::findOrFail($id);
    return view('dashboard',compact('user'));
  }
}
