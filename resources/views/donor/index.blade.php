@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Donor List') }} <a href="{{ route('donor.create') }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-plus"></i>&nbsp;Register Donor</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Residence Address</th>
                            <th scope="col">Town</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Identity Number</th>                            
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($donors as $donor)
                              @php
                                $counter = $loop->index + 1;
                                $fullName = implode(' ', array_filter([ $donor->first_name, $donor->last_name]));
                                $fullAddress = implode(' ', array_filter([ $donor->address1, $donor->address2, $donor->address3]));
                              @endphp
                            <tr>
                                <th scope="row"> {{ $counter }} </th>
                                <td>{{ $fullName }}</td>
                                <td>{{ $donor->contact_number }}</td>
                                <td>{{ $fullAddress }}</td>
                                <td>{{ $donor->city }}</td>
                                <td>{{ $donor->gender }}</td>
                                <td>{{ $donor->identity_number }}</td>                                
                                <td>{{ $donor->created_at }}</td>
                              </tr>
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection