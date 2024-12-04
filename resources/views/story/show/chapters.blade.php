@extends('layouts.show-story')

@section('main')
    <div>
        <h2 class="text-xl text-slate-800 mb-4">Chapters</h2>
        @foreach($data['chapters'] as $chapter)
            <div class="border-y border-slate-100 py-4">
                <h2 class="text- text-slate-700 mb-1">
                    {{$chapter->title}}
                </h2>
                <p class="text-xs text-slate-500">
                    {{ $chapter->created_at->format('d M Y') }}
                </p>
            </div>
        @endforeach
    </div>
@endsection

