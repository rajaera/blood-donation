<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
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
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('camp.index', ['camps' => Camp::findAll()]);
    }
}
