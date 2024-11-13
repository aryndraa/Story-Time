@extends('layout')
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        @auth
            {{ __('You are logged in!') }}
        @else
            {{ __('Please login to access the dashboard.') }}
        @endauth
    </div>
@endsection
