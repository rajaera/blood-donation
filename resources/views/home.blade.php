@inject('camp', 'App\Models\Camp')
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
                      <div>
                          @php
                              $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id');
                          @endphp                          
                      </div>
                </div>
                <div class="card-body">
                    @foreach ($progressingCampingSchedules as $schedule)
                        @php
                            $campName = $camp::getCampNameById($schedule->camp_id);  
                        @endphp
                        @if ($schedule->id == $ongoing_camp_schedule_id)
                            <a href="{{ route('camp-schedule.show', $schedule->id) }}" class="btn btn-outline-danger btn-lg mt-1" role="button" aria-pressed="true">
                                <i class="bi bi-play-circle"></i>&nbsp;{{ $schedule->title }} sheduled @ {{ $campName }} on {{ $schedule->schedule_at }}
                            </a>
                        @else
                        <a href="{{ route('camp-schedule.show', $schedule->id) }}" class="btn btn-outline-secondary btn-lg mt-1" role="button" aria-pressed="true">
                            {{ $schedule->title }} sheduled @ {{ $campName }} on {{ $schedule->schedule_at }}
                        </a>
                        @endif
                    @endforeach         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
