<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop', compact('shops'));
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->id);
        return view('detail',['shop' => $shop]);
    }
}
