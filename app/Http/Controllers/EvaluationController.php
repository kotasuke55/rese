<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Evaluation;
use App\Http\Requests\EvaluationRequest;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index(Request $request)
    {
        $auth_id = Auth::id();
        $reserve = Reserve::find($request->id);
        return view('evaluation',compact('reserve','auth_id'));
    }

    public function create(EvaluationRequest $request)
    {
        $evaluation = $request->all();
        unset($evaluation['_token']);
        unset($evaluation['id']);
        dd($evaluation);
        Evaluation::create($evaluation);
        Reserve::find($request->id)->delete();
        return redirect('mypage');
    }
}
