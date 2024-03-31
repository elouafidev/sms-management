<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {

        if(empty($request->input('access_key')) ) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 101,
                    'type' => "missing_access_key",
                    'info' => "You have not supplied an API Access Key. [Required format: access_key=YOUR_ACCESS_KEY]"
                ],
            ]);
        }
        $user = User::getWithToken($request->input('access_key'));
        if($user == null){
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 101,
                    'type' => "invalid_access_key",
                    'info' => "You have not supplied a valid API Access Key. [Technical Support: mouad@elouafi.dev]"
                ],

            ]);
        }
        Auth::login($user);
        return $next($request);
    }
}
