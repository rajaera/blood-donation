<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CampSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'campingSchedules' => DB::table('camp_schedule')->paginate(5)
        ]);
    }

    public function create() {
        return view('camp_schedule.create');
    }

    public function store(Request $request) {
        $request->validate([
            'camp_id' => 'required|integer',
            'title' => 'required|string',
            'schedule_at' => 'required|date',
            'comment' => 'required|string:|min:5|max:255'            
        ]);
    }
}