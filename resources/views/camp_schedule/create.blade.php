@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule New Camp') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('camp-schedule.store') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="camp_id" class="col-md-4 col-form-label text-md-right">{{ __('Camp Name') }}</label>

                            <div class="col-md-6">
                                <select id="camp_id" name="camp_id" type="text" class="form-control @error('camp_id') is-invalid @enderror" camp_id="camp_id" value="{{ old('camp_id') }}" required autocomplete="camp_id" autofocus>
                                    <option value="0">----Select Camp to Schedule----</option>
                                    @foreach ($camps as $camp)
                                        <option value="{{ $camp->id }}">{{ $camp->name }}</option>
                                    @endforeach
                                </select>
                               

                                @error('camp_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" title="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="schedule_at" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Date') }}</label>

                            <div class="col-md-6">
                                <input placeholder="YYYY-MM-DD" id="schedule_at" name="schedule_at" type="text" class="form-control @error('schedule_at') is-invalid @enderror" schedule_at="schedule_at" value="{{ old('schedule_at') }}" required autocomplete="schedule_at" autofocus>

                                @error('schedule_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea id="comment"  name="comment" type="text" class="form-control @error('comment') is-invalid @enderror" comment="comment" required autocomplete="comment" autofocus rows="3">{{ old('comment') }}</textarea>
                                

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Schedule') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection