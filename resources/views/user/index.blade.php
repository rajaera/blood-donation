@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User List') }} <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm float-right" role="button" aria-pressed="true"><i class="bi bi-plus"></i>&nbsp;Register User</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                            <th scope="col">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                              @php($counter = $loop->index + 1)
                            <tr>
                                <th scope="row"> {{ $counter }} </th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                  <form method="POST" action="{{ route('user.destroy', ['user_id' => $user->id]) }}" class="d-inline">
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