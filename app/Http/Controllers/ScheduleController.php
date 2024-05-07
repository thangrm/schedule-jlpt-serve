<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedules(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);

        $lessons = Lesson::where('date', '>=', $request->start_date)
            ->where('date', '<=', $request->end_date)
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
            'is_update' => 'nullable|boolean',
            'date' => 'required|date_format:Y-m-d',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i',
            'number_word' => 'nullable|integer|between:0,1000',
            'number_word_completed' => 'nullable|integer|between:0,1000',
            'vocabulary_note' => 'nullable|string',
            'is_study_grammar' => 'nullable|boolean',
            'grammar_note' => 'nullable|string',
            'is_study_listening' => 'nullable|boolean',
            'listening_checked' => 'nullable|boolean',
            'is_study_reading' => 'nullable|boolean',
            'reading_checked' => 'nullable|boolean',
        ]);

        if ($request->is_update) {
            $lesson = Lesson::where('date', $request->date)->firstOrFail();
            $fieldUpdate = [
                'time_start',
                'number_word',
                'is_study_grammar',
                'is_study_listening',
                'is_study_reading',
                'number_word_completed',
                'vocabulary_note',
                'grammar_note',
                'grammar_checked',
                'listening_checked',
                'reading_checked',
            ];

            foreach ($fieldUpdate as $field) {
                if (!is_null($request->$field)) {
                    $lesson->$field = $request->$field;
                }
            }
            if ($lesson->number_word_completed > $lesson->number_word) {
                $lesson->number_word_completed = $lesson->number_word;
            }

            $lesson->update();

            return [
                'status' => true,
                'lesson' => $lesson,
                'message' => 'Schedule update successful'
            ];
        }

        Lesson::create([
            'date' => $request->date,
            'user_id' => $request->user()->id,
            'level_id' => 3,
            'time_start' => $request->time_start,
            'number_word' => $request->number_word,
            'number_word_completed' => 0,
            'is_study_grammar' => $request->is_study_grammar,
            'is_study_listening' => $request->is_study_listening,
            'is_study_reading' => $request->is_study_reading,
            'is_done' => false,
        ]);

        return [
            'status' => true,
            'message' => 'Schedule update successful'
        ];
    }

    public function delete(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);
        Lesson::where('date', $request->date)->delete();

        return [
            'status' => true,
            'message' => 'Schedule delete successful'
        ];
    }

}
