<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Group;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = $request->date;
        $groups = Group::all();
        if (!isset($date)) {
            $days = Day::where('group_id', 0)->get();
        } else {
            $days = Day::where('date', $date)->where('group_id','!=',0)->get();
        }
        return view('admin.days.index', compact('days', 'date', 'groups'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $group_id = $request->group_id;
        if (isset($group_id)) {
            $day = new Day();
            $day->group_id = $group_id;
            $day->date = $request->date;
            $day->save();
            return redirect()->route('days.index', ['date' => $day->date])
                ->with('success', 'Day created successfully.');
        } else {
            $day = new Day();
            $day->group_id = 0;
            $day->date = $request->date;
            $day->save();
            return redirect()->route('days.index')
                ->with('success', 'Day created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function edit(Day $day)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Day $day)
    {
        $group_id = $request->group_id;
        $day = Day::find($request->id);
        if (isset($group_id)) {
            $day->group_id = $group_id;
            $day->date = $request->date;
            $day->save();
        } else {
            $day->group_id = 0;
            $day->date = $request->date;
            $day->save();
        }
        return redirect()->route('days.index', ['date' => $day->date])
            ->with('success', 'Day updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Day $day)
    {
        if ($day->group_id != 0) {
            $day->delete();
            return redirect()->route('days.index')
                ->with('success', 'Day deleted successfully');
        } else {
            Day::where('date', $day->date)->delete();
            return redirect()->route('days.index')
                ->with('error', 'Day not deleted');
        }
        $day->delete();
        return redirect()->route('days.index', ['date' => $day->date])
            ->with('success', 'Day deleted successfully');
    }
}
