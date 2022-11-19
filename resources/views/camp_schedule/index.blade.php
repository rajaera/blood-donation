@extends('layouts.app')
@php
  $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id');      
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Camping Schedules') }} <a href="{{ route('camp-schedule.create') }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-alarm"></i>&nbsp;Schedule New Camp</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">#</th>
                            <th scope="col">Sheduled At</th>
                            <th scope="col">Camp</th>
                            <th scope="col">Title</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Status</th>
                            <th scope="col">&nbsp;</th>                               
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($campingSchedules as $schedule)
                              @php
                                $counter = $loop->index + 1; 
                              @endphp
                            <tr>
                                <th scope="row">   @if ($ongoing_camp_schedule_id == $schedule->id) <span style="color: red;" title="Ongoing Scheduled Camp"><i class="bi bi-play"></i></span> @endif </th>
                                <th scope="row"> {{ $counter }} </th>                                
                                <td>{{ $schedule->schedule_at }}</td>
                                <td>{{ $schedule->bloodCamp->name }}</td>
                                <td>{{ $schedule->title }}</td>
                                <td>{{ $schedule->comment }}</td>
                                <td>{{ $schedule->created_at }}</td>  
                                <td>{{ $schedule->is_done ? 'DONE' : 'YET' }}</td>   
                                <td><a class="btn btn-outline-secondary" href="{{ route('camp-schedule.show', ['camp_schedule' => $schedule->id]) }}" role="button" title="View Schedule"><i class="bi bi-eye"></i></a></td>                             
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