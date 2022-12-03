@inject('camp', 'App\Models\BloodCamp')
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
                        @include('donor.partials.form')

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