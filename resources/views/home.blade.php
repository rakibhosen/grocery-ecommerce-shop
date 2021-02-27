{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}

@extends('layout')
@section('content')
    <div class="container">
        <h1 class="display-4 text-center" style="font-size: 2.5rem">@lang("Hello!")</h1>
        <h3 class="display-4 text-center" style="font-size: 1.5rem">{{ trans('lang.title') }}</h3>
        <h4 class="display-4 text-center" style="font-size: 1.5rem">{{ __("Stay with us and keep learning")}}</h4>
    </div>
@endsection