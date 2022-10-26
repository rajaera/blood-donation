<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonorController extends Controller {
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
        return view('donor.index', [
            'donors' => DB::table('donors')->paginate(5)
        ]);
    }

    public function create() {
        return view('donor.create');
    }

    public function store(Request $request) {

       

        $donor = new Donor();
        $donor->first_name = $request->input('first_name');
        $donor->last_name = $request->input('last_name');
        $donor->address1 = $request->input('address1');
        $donor->address2 = $request->input('address2');
        $donor->address3 = $request->input('address3');
        $donor->city = $request->input('city');
        $donor->contact_number = $request->input('contact_number');
        $donor->identity_number = $request->input('identity_number');
        $donor->gender = $request->input('gender');

        $donor->save();


        return redirect()->route('donor');
        
    }


}