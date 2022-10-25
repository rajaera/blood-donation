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
                    <span class="h3">The Children of Light Organization</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
