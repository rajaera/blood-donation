<?php

namespace App\Http\Controllers;

use App\Exports\ExportDonor;
use App\Http\Controllers\Controller;
use App\Models\BloodDonation;
use App\Models\CampSchedule;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DonorController extends Controller
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

        $filter = $request->query('filter');
        $bloodGroupFilterId =  $request->query('blood_group_id');

        if (!empty($filter)) {
            $donors = DB::table('donors')                
                ->orWhere('first_name', 'like',  '%'.$filter.'%')
                ->orWhere('last_name', 'like',  '%'.$filter.'%')
                ->orWhere('contact_number', 'like', '%'.$filter.'%')
                ->orWhere('address1', 'like', '%'.$filter.'%')
                ->orWhere('city', 'like', '%'.$filter.'%')
                ->orWhere('gender', '=', strtoupper($filter))
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } 
        
        if (!empty($bloodGroupFilterId)) {
            $donors = DB::table('donors')                
                ->orWhere('blood_group_id', '=',  $bloodGroupFilterId)                
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
            
        }

        if(!isset($donors)) {
            $donors = DB::table('donors') ->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('donor.index')->with('donors', $donors)->with('filter', $filter)->with('bloodGroupFilterId', $bloodGroupFilterId);
    }

    public function create()
    {
        return view('donor.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string',
            'address1' => 'required|string',
            'contact_number' => 'required|string|min:9|max:12',
            'identity_number' => 'required|string:|min:9|max:15',
            'gender' => 'required|string|min:4|max:6',
            'blood_group_id' => 'integer',
            'source_id' => 'integer',
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
        $donor->blood_group_id = $request->input('blood_group_id');
        $donor->source_id = $request->input('source_id');

        $donor->created_by = Auth::id();


        if ($donor->save() && $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id')) {
            /**
             * If there is an ongoing camp is beign set then add the donor to the donation list as well
             */
            $scheduledCamp = CampSchedule::find($ongoing_camp_schedule_id);
            /**
             * Create donation record for the donor
             */
            $donationRecord = BloodDonation::create([
                'donor_id' => $donor->id,
                'camp_schedule_id' => $scheduledCamp->id,
                'created_by' => Auth::id()
            ]);            
        }


        return redirect()->route('donor');
    }

    public function show($id)
    {
        return view('donor.show', ['donor' => Donor::find($id)]);
    }

    public function edit($id)
    {
        dd($id);
    }

    public function export() {
        return Excel::download(new ExportDonor, 'donors.xlsx');
    }
}
