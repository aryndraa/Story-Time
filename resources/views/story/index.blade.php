@extends('layout')
@section('content')
    <section class="min-h-[200vh] justify-center ">
        <div>
            <x-browse.slider/>
        </div>
        <div class="px-10 py-6">
            <div class="flex items-center gap-2 mb-6 pb-6 border-b border-b-neutral-50/5">
                <span class="text-amber-400 text-2xl">
                    <i class='bx bx-time-five' ></i>
                </span>
                <h1 class="text-xl ">
                    Latest Stories
                </h1>
            </div>
            <div class="swiper mySwiper w-full">
                <div class="swiper-wrapper items-stretch ">
                    @foreach($data['newStories'] as $story)
                        <x-card.story-card :cover="$story->covers[0]->file_url" :cover2="$story->covers[1]->file_url ?? null" :title="\Illuminate\Support\Str::limit($story->title, 25)" :category="$story->storyCategory->name"/>
                    @endforeach
                </div>
            </div>
            <div  class="py-12 ">
                <h1 class="text-2xl mb-6 pb-6 border-b border-b-neutral-50/5">All Stories</h1>
                <div class="grid grid-cols-4 gap-4">
                    @foreach($data['stories'] as $story)
                        <x-card.story-card :cover="$story->covers[0]->file_url" :cover2="$story->covers[1]->file_url ?? null" :title="\Illuminate\Support\Str::limit($story->title, 25)" :category="$story->storyCategory->name"/>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection
