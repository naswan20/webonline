<?php
// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $user = auth()->user();
        
        // Cek apakah user memiliki role yang diizinkan
        if ($user->role && in_array($user->role->name, $roles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses, redirect ke halaman yang sesuai
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}