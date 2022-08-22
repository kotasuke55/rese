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
use App\Models\Representative;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.admin');
    }

    public function create(Request $request)
    {
        $representative = Representative::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('admin.auth.admin');
    }
}
