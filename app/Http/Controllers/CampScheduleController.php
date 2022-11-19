<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BloodCamp;
use App\Models\Camp;
use App\Models\CampSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampScheduleController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Response
     */

    public function index() 
    {
        return view('camp_schedule.index', [
            'campingSchedules' => CampSchedule::orderBy('schedule_at', 'DESC')->paginate(5)
        ]);
    }

    public function create() {
        $camps = BloodCamp::orderBy('schedule_at', 'ASC')->get();
        return view('camp_schedule.create', ['camps' => $camps]);
    }

    public function store(Request $request) {
        $request->validate([
            'camp_id' => 'required|integer',
            'title' => 'required|string',
            'schedule_at' => 'required|date',
            'comment' => 'required|string:|min:5|max:255'            
        ]);

        $schedule = new CampSchedule();
        $schedule->camp_id = $request->input('camp_id');
        $schedule->title = $request->input('title');
        $schedule->schedule_at = $request->input('schedule_at');
        $schedule->comment = $request->input('comment');
        $schedule->created_by = Auth::id();
        $schedule->is_done = false;

        $schedule->save();


        return redirect()->route('camp-schedule.index');
    }

    public function show($id) {      
        
        return view('camp_schedule.show', ['schedule' => CampSchedule::findOrFail($id)]);
    }

    /**
     * Set an ongoing sheduled camp, this will also take when create donor as thier ongoing scheduled camp
     * If same schedule camp id come as request it will be toggled
     */
    public function ongoingcamp(Request $request, $id) {
        //toggle session
        if($request->session()->get('ongoing_camp_schedule_id') && $request->session()->get('ongoing_camp_schedule_id') == $id) {
            //unset the session
            $request->session()->forget('ongoing_camp_schedule_id');
        } else {
            $request->session()->put('ongoing_camp_schedule_id', $id);
        }
        
        return redirect()->route('camp-schedule.show',['camp_schedule' => $id]);
    }
}