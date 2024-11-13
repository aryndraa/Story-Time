@extends('layout')
@section('content')
    <section class="min-h-screen flex items-center justify-center">
        <div class="p-6 border border-neutral-50/5 w-[28rem]">
            <div class="flex gap-4 items-center mb-6 pb-6 border-b border-neutral-50/5">
                <img src="{{ $data['user']['avatar']->file_url }}" alt="" class="w-16 max-h-16 rounded-full object-cover">
                <div>
                    <h1 class="text-2xl font-medium">
                        {{$data['user']->username}}
                    </h1>
                    <h2 class="text-sm text-neutral-400">
                        {{$data['user']->email}}
                    </h2>
                </div>
            </div>
            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="flex justify-between w-full bg-neutral-900 py-3 px-4 font-medium text-neutral-400">
                        Logout
                        <span class="text-xl">
                            <i class='bx bx-log-out' ></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
