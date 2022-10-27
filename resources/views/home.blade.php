@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="{{ asset('images/the-children-of-light-organisation.png') }}" width="75">
                    <span class="h3">{{ __('The Children of Light Organization') }}</span>
                    &nbsp;    
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Select Ongoing Camp
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('donor.camp', 1) }}">Bopitiya Church</a>
                            <a class="dropdown-item active" href="{{ route('donor.camp', 2) }}">Kerawalapitiya People's Pharmacy</a>
                            <a class="dropdown-item" href="{{ route('donor.camp', 3) }}">Pamunugama Church RC</a>                          
                        </div>
                      </div>

                      <div>
                          @php
                              $camp_id = session('ongoing_camp_id');
                          @endphp
                          on going camp is {{  $camp_id }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
