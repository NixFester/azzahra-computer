<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        $exists = DB::table('visitors')
            ->where('ip_address', $ip)
            ->whereDate('visited_at', today())
            ->exists();

        if (!$exists) {
            DB::table('visitors')->insert([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
}
