@inject('source', 'App\Models\Source')
@inject('bloodGroup', 'App\Models\BloodGroup')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Show Donor') }} 
                    <a href="{{ route('donor.edit', $donor->id) }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-pencil-fill"></i>&nbsp;Update Donor</a>
                </div>

                <div class="card-body">
                            @php                                  
                                
                                $fullName = implode(' ', array_filter([$donor->first_name, $donor->last_name]));  
                                $fullAddress =  implode(' ', array_filter([$donor->address1, $donor->address2, $donor->address3]));                           
                            @endphp
                    <table class="table">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="row"> {{ $donor->id }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="row"> {{ $fullName }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Contact Number</th>
                            <th scope="row"> {{ $donor->contact_number }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Residence Address</th>
                            <th scope="row"> {{  $fullAddress }} </th>
                        </tr>

                        <tr>
                            <th scope="col">Town</th>
                            <td>{{ $donor->city }}</td>
                        </tr>                        
                        <tr>
                            <th scope="col">Gender</th>
                            <td style="color: green;"><i class="bi bi-gender-{{ strtolower($donor->gender) }}" title="{{ $donor->gender }}"></i></td> 
                        </tr>
                        <tr>
                            <th scope="col">Identity Number</th>
                            <td>{{ $donor->identity_number }}</td>
                        </tr>                           
                        <tr>
                            <th scope="col">Blood Group</th>  
                            <td style="color: red;font-weight: bold;">{{ $donor->blood_group_id ? $bloodGroup::getNameById($donor->blood_group_id) : '' }}</td>
                        </tr> 
                        <tr>
                            <th scope="col">Source</th>
                            <td>{{  $donor->source_id ? $source::getSourceById($donor->source_id): '' }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Created At</th>
                            <td>{{ date('d/m/Y', strtotime($donor->created_at)) }}</td>
                        </tr>                         
                      </table>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection