<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('camp.index', ['camps' =>  DB::table('camps')->orderBy('name', 'ASC')->paginate(10)]);
    }

    public function create() 
    {

    }
}
