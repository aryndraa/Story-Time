@extends('layouts.show-story')

@section('main')
    <div class="border-b border-slate-200 pb-6 mb-6">
        <h2 class="text-xl text-slate-800 mb-3">Synopsis</h2>
        <p class="text-slate-600 text-sm text-justify">{{$data['story']->synopsis}}</p>
    </div>
    <div>
        <div class="flex items-center gap-3 mb-6">
            <img src="{{$data['story']->user->avatar->file_url}}" alt="" class="w-12 h-12 object-cover rounded-full">
            <div>
                <p class="text-lg text-slate-600">{{$data['story']->user->name}}</p>
                <p class="text-sm text-slate-600">{{$data['story']->user->email}}</p>
            </div>
        </div>
        <p class="text-slate-600 text-sm text-justify mb-2">
            <span class="font-medium">Created At : </span>
            {{$data['story']->created_at->format('d M Y')   }}
        </p>
        <p class="text-slate-600 text-sm text-justify">
            <span class="font-medium">Last Updates : </span>
            {{$data['story']->updated_at->format('d M Y')   }}
        </p>
    </div>
@endsection
