@inject('camp', 'App\Models\Camp')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Show Camping Schedule') }} 
                    <a href="{{ route('camp-schedule.ongoingcamp', $schedule->id) }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-alarm"></i>&nbsp;Set as Ongoing Scheduled Camp</a>
                </div>

                <div class="card-body">
                            @php                                  
                                $campName = $camp::getCampNameById($schedule->camp_id);                              
                            @endphp
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