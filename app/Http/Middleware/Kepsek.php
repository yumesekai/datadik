<?php

namespace App\Http\Middleware;

use Closure;

class Kepsek
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
        //if ($request->user()->role != 'Kepsek') {
        //    return redirect('/');
        //}
        //return $next($request);

	$user = \App\Uuser::where('email', $request->email)->first();
	if ($user->role == 'admin'){
	   return redirect('admin/index')
	}elseif ($user->role == 'guru'){
	   return redirect('guru/index')
    	}elseif ($user->role == 'siswa'){
	   return redirect('siswa/index')
	}
	return $next($request);
}
