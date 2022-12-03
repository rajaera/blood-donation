@extends('layouts.app')
@php
  $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id');      
@endphp

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Camping Schedules') }} <a href="{{ route('camp-schedule.create') }}" class="btn btn-outline-secondary btn-sm float-right" role="button" aria-pressed="true"><i class="bi bi-alarm"></i>&nbsp;Schedule New Camp</a></div>

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
                                <td>{{ $schedule->schedule_at->format('d/m/Y') }}</td>
                                <td>{{ $schedule->bloodCamp->name }}</td>
                                <td>{{ $schedule->title }}</td>
                                <td>{{ $schedule->comment }}</td>
                                <td>{{ $schedule->created_at->format('d/m/Y') }}</td>  
                                <td>
                                  @if ($schedule->is_done)
                                    <i style="color:green;" class="bi bi-check2-circle" title="Marked as done"></i>
                                  @else
                                    <i class="bi bi-hourglass-split" title="On progress"></i>
                                  @endif
                                </td>   
                                <td>
                                  <a class="btn btn-outline-secondary btn-sm d-inline" href="{{ route('camp-schedule.show', ['camp_schedule' => $schedule->id]) }}" role="button" title="View Schedule"><i class="bi bi-eye"></i></a>
                                  <a class="btn btn-outline-secondary btn-sm d-inline" href="{{ route('camp-schedule.edit', ['camp_schedule' => $schedule->id]) }}" role="button" title="Edit Camp"><i class="bi bi-pencil-fill"></i></a>  
                                  <form method="POST" action="{{ route('camp-schedule.destroy', ['camp_schedule' => $schedule->id]) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-secondary btn-sm d-inline" role="button"><i class="bi bi-trash"></i></button>
                                  </form>
                                </td>                             
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