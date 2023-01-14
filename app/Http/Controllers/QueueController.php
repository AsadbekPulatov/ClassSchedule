<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Lesson;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date;
        if (isset($date)) {
            $days = Day::where('date', $date)->get();
            $day_id = [];
            foreach ($days as $day) {
                $day_id[] = $day->id;
            }
            $lessons = Lesson::whereIn('day_id', $day_id)->get();
            $today = $date;
            return view('admin.dashboard', compact('lessons', 'today'));
        } else {
            $today = date('Y-m-d');
            $lessons = Lesson::orderBy('start_time')->where('day_id', $today)->get();
            return view('admin.dashboard', compact('lessons', 'today'));
        }
    }
}
