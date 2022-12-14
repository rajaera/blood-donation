<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBloodCamp;
use App\Models\BloodCamp;
use App\Models\CampSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BloodCampController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('blood_camp.index', ['camps' =>  BloodCamp::orderBy('name', 'ASC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blood_camp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodCamp $request)
    {
        $validated = $request->validated();

        $camp = new BloodCamp();
        $camp->fill($validated);

        $camp->created_by = Auth::id();

        $camp->save();

        $request->session()->flash('status', "The camp [{$camp->name}] has been created successfully!");

       return redirect()->route('blood-camp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blood_camp.edit', ['camp' => BloodCamp::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBloodCamp $request, $id)
    {

        $camp = BloodCamp::findOrFail($id);

        $validated = $request->validated();
        $camp->fill($validated);
        $camp->save();

        $request->session()->flash('status', "The camp [{$camp->name}] has been updated successfully!");
       
        return redirect()->route('blood-camp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $camp = BloodCamp::findOrFail($id);
        
        //check camp is in use
        $campSchedule = CampSchedule::where('camp_id', '=', $id)->first();
        if($campSchedule) {
            $request->session()->flash('status', "Cannot delete the camp [{$camp->name}], It has been scheduled.");
        }

        if(!$campSchedule) {
            //soft delete
            $camp->delete();
            $request->session()->flash('status', "The camp [{$camp->name}] has been deleted successfully!");
        }

        return redirect()->route('blood-camp.index');
        
    }
}
