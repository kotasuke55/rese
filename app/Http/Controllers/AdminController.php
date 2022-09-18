<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Representative;
use App\Models\User;
use Mail;
use App\Mail\SendTestMail;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.auth.admin',compact('users'));
    }

    public function create(AdminRequest $request)
    {
        $representative = Representative::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back();
    }

    public function send(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        
        $to = [
            [
                'email' => $user->email,
                'name' => $user->name.'様'
            ],

        ];
        Mail::to($to)->send(new SendTestMail($user));

        return view('admin.auth.mail');
    }

}
