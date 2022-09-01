<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function reserve(ReserveRequest $request)
    {   
        $form = $request->all();
        Reserve::create($form);
        return view('done');
    }

    public function remove(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $reserve = Reserve::find($request->id);
        return view('edit',compact('reserve'));
    }

    public function update(ReserveRequest $request)
    {
        $reserve = $request->all();
        unset($reserve['_token']);
        Reserve::where('id',$request->id)->update($reserve);
        return redirect('mypage');
    }

    public function qrcode(Request $request)
    {
        
        $reserve = Reserve::find($request->id);
        return view('qrcode',compact('reserve'));
    }
}
