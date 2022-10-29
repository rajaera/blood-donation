<?php

namespace App\Exports;

use App\Models\Donor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDonor implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Donor::select('created_at', 'first_name', 'last_name', 'address1', 'address2', 'address3', 'city', 'contact_number', 'identity_number', 'gender', 'source_id', 'blood_group_id')->get();
    }
}
