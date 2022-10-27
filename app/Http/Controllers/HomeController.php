<?php

namespace App\Http\Controllers;

use App\Models\CampSchedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $progressingCampingSchedules = CampSchedule::where('is_done', '=', false)->get();
        return view('home', ['progressingCampingSchedules' => $progressingCampingSchedules]);
    }
}
