<?php

namespace App\Exports;

use App\Models\BloodGroup;
use App\Models\Donor;
use App\Models\Source;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportDonor
implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithColumnFormatting,
    ShouldAutoSize
{
    use Exportable;


    public function collection()
    {
        return Donor::select(
            'created_at',
            'first_name',
            'last_name',
            'address1',
            'address2',
            'address3',
            'city',
            'contact_number',
            'identity_number',
            'gender',
            'source_id',
            'blood_group_id'
        )->orderBy('created_at', 'DESC')->get();
    }

    public function headings(): array
    {
        return [
            'Created At',
            'Name',
            'Residence Address',
            'Town',
            'Contact Number',
            'Identity Number',
            'Gender',
            'Source',
            'Blood Group'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @var Donor $donor
     */
    public function map($donor): array
    {
        return  [
            $donor->created_at,
            implode(' ',  array_filter([$donor->first_name, $donor->last_name])),
            implode(' ',  array_filter([$donor->address1, $donor->address2, $donor->address3])),
            $donor->city,
            $donor->contact_number,
            $donor->identity_number,
            $donor->gender,
            Source::getSourceById($donor->source_id),
            $donor->blood_group_id ? BloodGroup::getNameById($donor->blood_group_id) : ''
        ];
    }
}
