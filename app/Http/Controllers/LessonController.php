<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Lesson;
use App\Models\Room;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $day_id = $request->day_id;
        $day = Day::find($day_id);
        $group_id = $day->group_id;
        $date = $day->date;
        $day_id = Day::where('date', $date)->where('group_id', 0)->first()->id;


        $rooms = Room::all();
        $lessons = Lesson::where('day_id', $day_id)->where('group_id', $group_id)->get();
        return view('admin.lessons.index', compact('lessons','rooms', 'day_id', 'group_id','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lessons = Lesson::where('day_id', $request->day_id)->where('room_id', $request->room_id)->get();
        $count = 0;
        $start_time = $request->start_time.':00';
        $end_time = $request->end_time.':00';
        if ($end_time <= $start_time){
            return redirect()->back()->with('error', "Vaqt oralig'i noto'g'ri kiritilgan");
        }
        foreach ($lessons as $value) {
            if (strtotime($value->start_time) <= strtotime($start_time) &&  strtotime($start_time) < strtotime($value->end_time)) {
                $count++;
            }
            else if (strtotime($start_time) < strtotime($value->start_time) && strtotime($end_time) > strtotime($value->end_time)){
                $count++;
            }
            if (strtotime($value->start_time) < strtotime($end_time) && strtotime($end_time) <= strtotime($value->end_time)) {
                $count++;
            }
        }
        if ($count > 0){
            return redirect()->back()->with('error', "Bu soatda boshqa dars mavjud");
        }
        Lesson::create($request->all());
        return redirect()->back()->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lessons = Lesson::where('day_id', $request->day_id)->where('room_id', $request->room_id)->get();
        $count = 0;
        $start_time = $request->start_time.':00';
        $end_time = $request->end_time.':00';
        if ($end_time <= $start_time){
            return redirect()->back()->with('error', "Vaqt oralig'i noto'g'ri kiritilgan");
        }
        foreach ($lessons as $value) {
            if (strtotime($value->start_time) <= strtotime($start_time) &&  strtotime($start_time) < strtotime($value->end_time)) {
                $count++;
            }
            else if (strtotime($start_time) < strtotime($value->start_time) && strtotime($end_time) > strtotime($value->end_time)){
                $count++;
            }
            if (strtotime($value->start_time) < strtotime($end_time) && strtotime($end_time) <= strtotime($value->end_time)) {
                $count++;
            }
        }
        if ($count > 0){
            return redirect()->back()->with('error', "Bu soatda boshqa dars mavjud");
        }
        $lesson = Lesson::find($request->id);
        $lesson->update($request->all());
        return redirect()->back()->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->back()->with('success', 'Lesson deleted successfully.');
    }
}
