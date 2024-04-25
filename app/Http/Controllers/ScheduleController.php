<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
    public function schedules(Request $request)
    {
        $now = Carbon::now();
        $lessons = Lesson::where('date', '>=', $now->firstOfMonth())
            ->where('date', '<=', $now->endOfMonth())
            ->get();

        return response()->json([
            'data' => [
                'total' => $lessons->count(),
                'lessons' => $lessons
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:lessons',
            'date' => 'nullable|date_format:Y-m-d',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i',
            'number_word' => 'nullable|integer|between:0,100',
            'number_word_completed' => 'nullable|integer|between:0,100',
            'vocabulary_note' => 'nullable|string',
            'is_study_grammar' => 'nullable|boolean',
            'grammar_note' => 'nullable|string',
            'is_study_listen' => 'nullable|boolean',
            'listen_checked' => 'nullable|string',
            'is_study_reading' => 'nullable|boolean',
            'reading_checked' => 'nullable|string',
        ]);

        return [
            'status' => true,
            'message' => 'Schedule update successful'
        ];
    }
}
