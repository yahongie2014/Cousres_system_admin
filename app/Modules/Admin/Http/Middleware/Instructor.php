<?php

namespace App\Modules\Admin\Http\Middleware;

use Closure;

use Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Instructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            $admin = 0;
            if( \Auth::user()->hasRole('admin') || \Auth::user()->hasRole('instructor') )
            {
               $admin = 1;
            }

            if($admin == 0){
                return redirect('/admin');
            }
            return $next($request);
        }
        return redirect()->route('getLogin');
    }
}
