@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule New Camp') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('camp-schedule.store') }}">
                        @csrf
                        @include('camp_schedule.partials.form')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Schedule') }}
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