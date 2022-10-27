@inject('camp', 'App\Models\Camp')
@extends('layouts.app')

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
                                $campName = $camp::getCampNameById($schedule->camp_id);                              
                              @endphp
                            <tr>
                                <th scope="row"> {{ $counter }} </th>
                                <td>{{ $schedule->schedule_at }}</td>
                                <td>{{ $campName }}</td>
                                <td>{{ $schedule->title }}</td>
                                <td>{{ $schedule->comment }}</td>
                                <td>{{ $schedule->created_at }}</td>  
                                <td>{{ $schedule->is_done ? 'DONE' : 'YET' }}</td>   
                                <td><a class="btn btn-outline-secondary" href="{{ route('camp-schedule.show', $schedule->id) }}" role="button" title="View Schedule"><i class="bi bi-eye"></i></a></td>                             
                              </tr>
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                </div>        
                <div>
                  @php
                      $camp_id = session('ongoing_camp_schedule_id');
                  @endphp
                  on going camp is {{  $camp_id }}
              </div>        
            </div>
        </div>
    </div>
</div>

@endsection