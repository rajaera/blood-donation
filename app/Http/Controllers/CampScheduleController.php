<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampSchedule;
use App\Models\BloodCamp;
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
            'campingSchedules' => CampSchedule::orderBy('schedule_at', 'DESC')->paginate(15)
        ]);
    }

    public function create() {
        $camps = BloodCamp::orderBy('name', 'ASC')->get();
        return view('camp_schedule.create', ['camps' => $camps]);
    }

    public function store(StoreCampSchedule $request) {
        

        $validated = $request->validated();
        

        $schedule = new CampSchedule();
        $schedule->fill($validated);

        $schedule->created_by = Auth::id();
        $schedule->is_done = null;

        $schedule->save();

        $request->session()->flash('status', "New Schedule has been created successfully!");

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = CampSchedule::findOrFail($id);
        $camps = BloodCamp::orderBy('name', 'ASC')->get();

        return view('camp_schedule.edit', ['schedule' => $schedule, 'camps' => $camps]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCampSchedule $request, $id)
    {

        $schedule = CampSchedule::findOrFail($id);

        $validated = $request->validated();
        $schedule->fill($validated);
        $schedule->save();

        $request->session()->flash('status', "Schedule has been updated successfully!");
       
        return redirect()->route('camp-schedule.index');
    }
}