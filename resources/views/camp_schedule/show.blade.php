@extends('layouts.app')

@section('content')
@php                      
    $ongoing_camp_schedule_id = session('ongoing_camp_schedule_id');                    
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Show Camping Schedule') }} 
                    @if ($ongoing_camp_schedule_id == $schedule->id)
                    <a href="{{ route('camp-schedule.ongoingcamp', ['schedule_id' => $schedule->id]) }}" class="btn btn-outline-danger float-right" role="button" aria-pressed="true"><i class="bi bi-play"></i></i>&nbsp;Ongoing Scheduled Camp</a>
                    @else
                    <a href="{{ route('camp-schedule.ongoingcamp', ['schedule_id' => $schedule->id]) }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-alarm"></i>&nbsp;Set as Ongoing Scheduled Camp</a>
                    @endif
                    
                </div>

                <div class="card-body">                            
                    <table class="table">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="row"> {{ $schedule->id }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Sheduled At</th>
                            <th scope="row"> {{ $schedule->schedule_at->format('d/m/Y') }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Camp</th>
                            <th scope="row"> {{ $schedule->bloodCamp->name }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="row"> {{ $schedule->title }} </th>
                        </tr>

                        <tr>
                            <th scope="col">Comment</th>
                            <td>{{ $schedule->comment }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Created At</th>
                            <td>{{ $schedule->created_at->format('d/m/Y') }}</td>  
                        </tr>
                        <tr>
                            <th scope="col">Status</th>     
                            <td>
                                
                                <form method="POST" action="{{ route('camp-schedule.statusToggle', ['schedule_id' => $schedule->id]) }}" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-secondary btn-sm d-inline" role="button">
                                        @if ($schedule->is_done)
                                        <i style="color:green;" class="bi bi-check2-circle"></i>&nbsp;Mark as not done
                                        @else
                                        <i class="bi bi-hourglass-split"></i>&nbsp;Mark as done
                                        @endif                                       
                                    </button>
                                </form>
                            </td>
                        </tr>                        
                      </table>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection