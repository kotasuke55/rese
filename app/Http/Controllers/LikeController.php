<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function like(Request $request)
    {
        Like::create([
            'shop_id' => $request->id,
            'user_id' => Auth::user()->id
        ]);
        
        return redirect()->back();
    }

    public function unlike(Request $request)
    {

        Like::where('shop_id',$request->id)->where('user_id',Auth::id())->delete();
        
        return redirect()->back();
    }
}
