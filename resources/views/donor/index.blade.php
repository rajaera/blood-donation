@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Donor List') }} <a href="{{ route('donor.create') }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-plus"></i>&nbsp;Register Donor</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($donors as $donor)
                              @php($counter = $loop->index + 1)
                            <tr>
                                <th scope="row"> {{ $counter }} </th>
                                <td>{{ $donor->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->created_at }}</td>
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