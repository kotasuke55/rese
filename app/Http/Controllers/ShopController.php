<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('shop', compact('shops','areas','genres'));
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->id);
        $user_id = Auth::id();
        return view('detail',['shop' => $shop,'user_id' => $user_id]);
    }

    public function search(Request $request)
    {
        
        unset($request['_token']);
        $search_area = $request->search_area;
        $search_genre = $request->search_genre;
        $keyword = $request->keyword;

        $query = Shop::query();

        if(!empty($keyword)){
            $query->where('shop','LIKE',"%{$keyword}%");
        }
        if(!empty($search_area)){
            $query->where('area_id','LIKE',$search_area);
        }
        if(!empty($search_genre)){
            $query->where('genre_id','LIKE',$search_genre);
        }

        $shops = $query->get();

        $areas = Area::all();
        $genres = Genre::all();


        return view('shop',compact('keyword','search_area','search_genre','shops','areas','genres'));
    }
}
