@extends('layouts.default')

@section('main')
    <div class="mx-4 mt-6 justify-between items-center mb-6 pb-6 border-b border-slate-400">
        <div class="flex gap-2 items-center text-sm mb-4 text-slate-500">
            <a href="{{route('story.index')}}">Home</a>
            <span> > </span>
            <a href="{{route('story.show.overview', $data['storyID'])}}">{{$data['storyTitle']}}</a>
            <span> > </span>
            <p>{{$data['chapter']->title}}</p>
        </div>
        <h1 class="text-3xl font-medium text-slate-600">{{$data['chapter']->title}}</h1>
    </div>
    <div class="mx-4">
        @foreach(explode("\n", $data['chapter']->content) as $paragraph)
            @if(trim($paragraph) !== '')
                <p class="mb-12 text-justify text-slate-600">
                    {{ $paragraph }}
                </p>
            @endif
        @endforeach

    </div>
@endsection
