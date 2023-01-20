<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Lesson;
use App\Models\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request['date'];
        $start_time = $request['start_time'];
        $end_time = $request['end_time'];
        $days = Day::where('date', $data)->where('group_id', 0)->first();
        $lessons = Lesson::where(function ($query)
            use ($start_time, $end_time) {
                $query->where('start_time', '>=', $start_time)
                    ->where('start_time', '<=', $end_time);
            })
            ->orWhere(function ($query) use ($start_time, $end_time) {

                $query->where('end_time', '>=', $start_time)
                    ->where('end_time', '<=', $end_time);
            })
            ->get();
        if (isset($days)) {
            $lessons = $lessons->where('day_id', $days->id);
            $rooms = Room::orderBy('name')->get();
            $room = array();
            foreach ($rooms as $r) {
                $room[$r->id]['name'] = $r->name;
                $room[$r->id]['check'] = 0;
            }
            foreach ($lessons as $lesson) {
                $room[$lesson->room_id]['check'] = 1;
            }

        }
        else{
            $rooms = Room::orderBy('name')->get();
            $room = array();
            foreach ($rooms as $r) {
                $room[$r->id]['name'] = $r->name;
                $room[$r->id]['check'] = 0;
            }
        }
        return response()->json($room, 200);
    }
}
