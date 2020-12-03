<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class MoodTrackController extends Controller
{
    public function serve() {
        $allLogs = Log::where('user_email', auth()->user()->email)->get();
        $logs = Log::where('user_email', auth()->user()->email)
            ->orderBy('created_at', 'desc')->limit(7)->get();
        $logsFormatted = json_encode($logs->map(function($log) {
            return [
                'y' => $log->mood_level,
                'x' => $log->created_at->getPreciseTimestamp(3)
            ];
        }));
        return view('home.track', [
            'logs' => $allLogs,
            'dataPoints' => $logsFormatted
        ]);
    }

    public function showQuiz() {
        return view('home.quiz');
    }

    public function answerQuiz(Request $request) {
        $log = new Log;
        $log->mood_level = $request->mood_level;
        $log->user_email = auth()->user()->email;
        $log->save();
        return redirect()->route('home.track');
    }
}
