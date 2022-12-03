@inject('bloodGroup', 'App\Models\BloodGroup')
@inject('source', 'App\Models\Source')
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                  {{ __('Donor List') }} 
                  <a href="{{ route('donor.create') }}" class="btn btn-outline-secondary btn-sm float-right" role="button" aria-pressed="true"><i class="bi bi-plus"></i>&nbsp;Register Donor</a>
                  <a href="{{ route('donor.export') }}" class="btn btn-outline-success btn-sm float-right mr-1" role="button" aria-pressed="true"><i class="bi bi-file-spreadsheet-fill"></i>&nbsp;Export</a>
                </div>
                <div class="card-body">
                  <div class="row  float-right">
                    <div class="md-col-12"> 
                      <form class="form-inline" method="GET">
                        <div class="form-group mb-2">
                          <label for="filter" class="col-md-2 col-form-label mr-1">Filter</label>
                          <input type="text" class="form-control" id="filter" name="filter" placeholder="Search Donors..." value="{{ $filter }}">
                        </div>
                        <div class="form-group mb-2 mr-1">
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach ($bloodGroup::getGroups() as $bgKey1 => $bgVal1)                                       
                                <label class="form-control @error('blood_group_id') is-invalid @enderror btn btn-outline-danger btn-sm" blood_group_id="blood_group_id">
                                    <input type="radio" name="blood_group_id" autocomplete="off" value="{{ $bgKey1 }}"  @if ($bloodGroupFilterId == $bgKey1) checked="checked"  @endif> {{ $bgVal1 }}
                                </label>                                        
                            @endforeach
                          </div>
                        </div>                        
                        <button type="submit" class="btn btn-outline-secondary btn-sm mb-2 mr-1">Search</button>
                      </form>
                    </div>
                  </div>
                  
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Residence Address</th>
                            <th scope="col">Town</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Identity Number</th>   
                            <th scope="col">Source</th>
                            <th scope="col">Blood Group</th>  
                            <th scope="col">&nbsp;</th>   
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
                                <td>{{ date('d/m/Y', strtotime($donor->created_at)) }}</td>
                                <td>{{ $fullName }}</td>
                                <td>{{ $donor->contact_number }}</td>
                                <td>{{ $fullAddress }}</td>
                                <td>{{ $donor->city }}</td>
                                <td style="color: green;"><i class="bi bi-gender-{{ strtolower($donor->gender) }}" title="{{ $donor->gender }}"></i></td>
                                <td>{{ $donor->identity_number }}</td>
                                <td>{{  $donor->source_id ? $source::getSourceById($donor->source_id): '' }}</td>
                                <td style="color: red;font-weight: bold;">{{ $donor->blood_group_id ? $bloodGroup::getNameById($donor->blood_group_id) : '' }}</td>
                                <td>
                                  <a class="btn btn-outline-secondary btn-sm" href="{{ route('donor.show', ['donor' => $donor->id]) }}" role="button" title="View Donor"><i class="bi bi-eye"></i></a>
                                  <a class="btn btn-outline-secondary btn-sm" href="{{ route('donor.edit', ['donor' => $donor->id]) }}" role="button" title="Edit Donor"><i class="bi bi-pencil-fill"></i></a>  
                                </td>                             
                              </tr>
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                </div> 
                
                  <div class="card-footer">
                    <div class="row  float-right">
                      <div class="md-col-12"> 
                        {!! $donors->withQueryString()->links() !!}
                      </div>
                    </div>
                  </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection