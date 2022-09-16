<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Representative;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\RegisterRequest;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Reserve;
use Illuminate\Support\Facades\Storage;

class RepresentativeController extends Controller
{
    public function index()
    {
        $user = Auth('representative')->user();
        $shops = Shop::all();
        $representatives = Representative::all();
        $auth_id = $user->id;
        $reserve_shops = Shop::where('representative_id', $auth_id)->get();
        $genres = Genre::all();
        $areas = Area::all();
        return view('representative.management',compact('user','shops','representatives','reserve_shops','genres','areas'));
    }

    public function create(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file->getRealPath()));
        $form  = [
            'shop' => $request->shop,
            'content' => $request->content,
            'img' => $image,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'representative_id' => $request->representative_id
        ];
        dd($form);
        Shop::create($form);
        return redirect()->back();
    }

    public function find(Request $request)
    {
        $shop = Shop::find($request->id);
        return view('representative.edit',compact('shop'));
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Shop::where('id',$request->id)->update($form);
        Representative::where('id',$request->representative_id)->first()->update(['shop_id'=>$request->id]);
        return redirect('representative/management');
    }

    public function remove(Request $request)
    {
        Shop::find($request->id)->delete();
        
        $user = Auth('representative')->user();
        $shops = Shop::all();
        $representatives = Representative::all();
        $auth_id = $user->id;
        $reserve_shops = Shop::where('representative_id', $auth_id)->get();
        $genres = Genre::all();
        $areas = Area::all();
        return redirect('representative/management');
    }

    public function reserve(Request $request)
    {
        $reserves = Reserve::where('shop_id',$request->id)->get();
        return view('representative.reserve',compact('reserves'));
    }

    public function image(Request $request)
    {
        $id = $request->shop_id;
        //$image = $request->file('file');
        $image = base64_encode(file_get_contents($request->file->getRealPath()));
        $name = $request->file('file')->getClientOriginalName();
        $file = $request->file('file')->move('storage/store/'.$id,$name);
        //Storage::putFileAs("public/store/{$id}",$image,$name);
        return redirect()->back();
    }
}
