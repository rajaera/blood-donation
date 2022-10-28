@inject('camp', 'App\Models\Camp')
@inject('source', 'App\Models\Source')
@inject('campSchedule', 'App\Models\CampSchedule')
@inject('bloodGroup', 'App\Models\BloodGroup')
@inject('donor', 'App\Models\Donor')
@extends('layouts.app')
@php
    $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id');
@endphp 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register New Donor') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('donor.store') }}">
                        @csrf
                        <div class="mb-2">                           
                            @if ($ongoing_camp_schedule_id)
                                @php                                    
                                    $scheduledCamp = $campSchedule::find($ongoing_camp_schedule_id); 
                                    $campName = $camp::getCampNameById($scheduledCamp->camp_id);
                                @endphp 
                                <a href="{{ route('camp-schedule.show', $scheduledCamp->id) }}" class="btn btn-outline-danger btn-lg mt-1" role="button" aria-pressed="true">
                                    <i class="bi bi-play-circle"></i>&nbsp;{{ $scheduledCamp->title }} sheduled @ {{ $campName }} on {{ $scheduledCamp->schedule_at }}
                                </a>
                            @endif                         
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" first_name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" last_name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>

                            <div class="col-md-6">
                                <input id="address1" name="address1" type="text" class="form-control @error('address1') is-invalid @enderror" address1="address1" value="{{ old('address1') }}" required autocomplete="address1" autofocus>

                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>

                            <div class="col-md-6">
                                <input id="address2"  name="address2" type="text" class="form-control @error('address2') is-invalid @enderror" address2="address2" value="{{ old('address2') }}" autocomplete="address2" autofocus>

                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address3" class="col-md-4 col-form-label text-md-right">{{ __('Address 3') }}</label>

                            <div class="col-md-6">
                                <input id="address3" name="address3" type="text" class="form-control @error('address3') is-invalid @enderror" address3="address3" value="{{ old('address3') }}" autocomplete="address3" autofocus>

                                @error('address3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" city="city" value="{{ old('city') }}" autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_number" name="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" contact_number="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus>

                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identity_number" class="col-md-4 col-form-label text-md-right">{{ __('Identity Number') }}</label>

                            <div class="col-md-6">
                                <input id="identity_number" name="identity_number" type="identity_number" class="form-control @error('identity_number') is-invalid @enderror" identity_number="identity_number" value="{{ old('identity_number') }}" required autocomplete="email">

                                @error('identity_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">

                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @foreach ($donor::getGenders() as $gKey => $gVal)
                                    <label class="form-control @error('gender') is-invalid @enderror btn btn-outline-success" gender="gender">
                                        <input type="radio" name="gender" autocomplete="off" value="{{ $gKey }}"> {{ $gVal }}
                                    </label>
                                    @endforeach               
                                  </div>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="blood_group_id" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>

                            <div class="col-md-6">
                               
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @foreach ($bloodGroup::getGroups() as $bgKey1 => $bgVal1)                                       
                                        <label class="form-control @error('blood_group_id') is-invalid @enderror btn btn-outline-danger" blood_group_id="blood_group_id">
                                            <input type="radio" name="blood_group_id" autocomplete="off" value="{{ $bgKey1 }}"> {{ $bgVal1 }}
                                        </label>                                        
                                    @endforeach
                                  </div>
                                @error('blood_group_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="source_id" class="col-md-4 col-form-label text-md-right">{{ __('Source') }}</label>

                            <div class="col-md-6">
                                <select id="source_id" name="source_id" type="text" class="form-control @error('source_id') is-invalid @enderror" camp_id="source_id" value="{{ old('source_id') }}" required autocomplete="source_id" autofocus>
                                    <option value="0">----Select Donor Source ----</option>
                                    @foreach ($source::getSources() as $scrKey => $scrVal)
                                        <option value="{{ $scrKey }}">{{ $scrVal }}</option>
                                    @endforeach
                                </select>                                
                                @error('source_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection