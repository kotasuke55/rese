<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function mypage()
  {
    $user = Auth::user()->name;;
    $shops = Shop::all();
    $reserves = Reserve::all();
    $likes = Like::all();
    return view('mypage',compact('user','shops','reserves','likes'));
  }
}
