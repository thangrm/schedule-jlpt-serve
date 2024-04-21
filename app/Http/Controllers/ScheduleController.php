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

    }
}
