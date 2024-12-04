@extends('layouts.show-story')

@section('main')
    <div>
        <h2 class="text-xl text-slate-800 mb-3">Synopsis</h2>
        <p class="text-slate-600 text-sm text-justify">{{$data['story']->synopsis}}</p>
    </div>
@endsection
