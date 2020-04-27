<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        $userData = Auth::user();
        if($userData != null){
            if ($userData->fkRoleId == 1 && $userData->fkRoleId == 1 && $userData->is_active == 1) {
                return $next($request);
            }
        }
        return redirect()->route('powerpanel.login'); // If user is not an admin.
    }
}
