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

        $request->validate([
            'first_name' => 'required|alpha_num|min:3|max:50',
            'last_name' => 'alpha_num|min:3|max:50',

            'address1' => 'required|alpha_num|min:3|max:50',
            'address2' => 'alpha_num|min:3|max:50',
            'address3' => 'alpha_num|min:3|max:50',
            'city' => 'alpha_num|min:3|max:50',

            'contact_number' => 'required|alpha_num|min:9|max:12',
            'identity_number' => 'required|alpha_num|min:9|max:15',

            'gender' => 'required|alpha_num|min:4|max:6',

        ]);

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

        //$donor->save();


        return redirect()->route('donor');
    }


}