<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function mypage()
  {
    $user = Auth::user()->name;
    $id = Auth::id();
    $reserves = Reserve::where('user_id',$id)->get();
    $likes = Like::where('user_id',$id)->get();
    $reserveDate = Reserve::where('date','<',date('Y-m-d H:i:s'))->get();
    foreach($likes as $like){
      dd($like->shop->id);
    }
    return view('mypage',compact('user','reserves','likes','reserveDate'));
  }
}
