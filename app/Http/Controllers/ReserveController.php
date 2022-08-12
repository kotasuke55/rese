<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function reserve(Request $request)
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
}
