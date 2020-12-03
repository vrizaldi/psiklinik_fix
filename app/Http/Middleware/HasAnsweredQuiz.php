<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use DateTime;
use Illuminate\Http\Request;

class HasAnsweredQuiz
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if(is_null($user)) return $next($request);

        $log = Log::where('user_email', $user->email)->orderBy('created_at', 'desc')->first();
        if(is_null($log)) return redirect()->route('home.track.quiz');

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $log->created_at);
        $from = \Carbon\Carbon::now();
        $diff_in_days = $to->diffInDays($from);
        if($diff_in_days > 0) return redirect()->route('home.track.quiz');

        return $next($request);
    }
}
