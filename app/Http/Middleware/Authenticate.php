<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    //userとadminとrepresentativeの名前付きルートを定義
    protected $user_root = 'login';
    protected $admin_root = 'admin.login';
    protected $representative_root = 'representative.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('admin.*')){
                return route($this->admin_root);
            }elseif(Route::is('representative.*')) {
                return route($this->representative_root);
            }else return route($this->user_root);
            
        }
    }
}