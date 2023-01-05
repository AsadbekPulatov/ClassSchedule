<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function copy(Request $request)
    {
        $copy_date = $request->input('copy_date');
        $paste_date = $request->input('paste_date');
        $days = Day::where('date', $copy_date)->get();
        $day_id = $days[0]->id;
        $lessons = Lesson::where('day_id', $day_id)->get();
        foreach ($days as $item) {
            $day = new Day();
            $day->group_id = $item->group_id;
            $day->date = $paste_date;
            $day->save();
            if ($item == $days->first()) {
                $day_id = $day->id;
            }
        }
        foreach ($lessons as $item) {
            $lesson = new Lesson();
            $lesson->name = $item->name;
            $lesson->day_id = $day_id;
            $lesson->group_id = $item->group_id;
            $lesson->room_id = $item->room_id;
            $lesson->start_time = $item->start_time;
            $lesson->end_time = $item->end_time;
            $lesson->save();
        }
        return redirect()->back()->with('success', 'Copied successfully');
    }
}
