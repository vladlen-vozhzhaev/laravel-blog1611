<?php

namespace App\Http\Middleware;

use App\Models\BindRole;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $bindRoles = BindRole::where(['role_id'=>2, 'user_id'=>$userId])->first();
        if(!empty($bindRoles)){
            return $next($request);
        }
        return redirect()->intended('/login');
    }
}
