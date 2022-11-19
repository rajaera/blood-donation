<?php

namespace App\Http\Controllers;

use App\Exports\ExportDonor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonor;
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
                ->orWhere('first_name', 'like',  '%' . $filter . '%')
                ->orWhere('last_name', 'like',  '%' . $filter . '%')
                ->orWhere('contact_number', 'like', '%' . $filter . '%')
                ->orWhere('address1', 'like', '%' . $filter . '%')
                ->orWhere('city', 'like', '%' . $filter . '%')
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

        if (!isset($donors)) {
            $donors = DB::table('donors')->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('donor.index')->with('donors', $donors)->with('filter', $filter)->with('bloodGroupFilterId', $bloodGroupFilterId);
    }

    public function create()
    {
        return view('donor.create');
    }

    public function store(StoreDonor $request)
    {

        $validated = $request->validated();

        $donor = new Donor();
        $donor->fill($validated);

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
        return view('donor.edit', ['donor' => Donor::findOrFail($id)]);
    }

    public function update(StoreDonor $request, $id)
    {

        $donor = Donor::findOrFail($id);

        $validated = $request->validated();

        $donor->fill($validated);
        if ($donor->save() && $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id')) {

            /**
             * If there is an ongoing camp is beign set then add the donor to the donation list as well
             */
            $scheduledCamp = CampSchedule::find($ongoing_camp_schedule_id);

            
            // Retrieve donation record or create if it doesn't exist
            $donationRecord = BloodDonation::firstOrCreate(
                ['donor_id' =>  $donor->id, 'camp_schedule_id' => $scheduledCamp->id],
                ['created_by' => Auth::id()]
            );
        }


        return redirect()->route('donor.show', ['donor' => $donor->id]);
    }

    public function export()
    {
        return Excel::download(new ExportDonor, 'donors.xlsx');
    }
}
