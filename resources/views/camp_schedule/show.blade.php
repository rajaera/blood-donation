@inject('camp', 'App\Models\Camp')
@extends('layouts.app')

@section('content')
@php     
    $campName = $camp::getCampNameById($schedule->camp_id);                            
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
                            <th scope="row"> {{ $schedule->schedule_at }} </th>
                        </tr>
                        <tr>
                            <th scope="col">Camp</th>
                            <th scope="row"> {{ $campName }} </th>
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
                            <td>{{ $schedule->created_at }}</td>  
                        </tr>
                        <tr>
                            <th scope="col">Status</th>     
                            <td>{{ $schedule->is_done ? 'DONE' : 'YET' }}</td>
                        </tr>                        
                      </table>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection