@extends('layouts.app')
@section('content')
    <section class="min-h-[200vh]">
        <x-profile-banner/>
        <div class="w-full mt-6 lg:mt-24 ">
            <span class="hidden md:block">
                <x-section-title :title="'Library'"/>
            </span>
            <div class="swiper newRelease ">
                <div class="swiper-wrapper px-4">
                    @foreach($data['popularStories'] as $story)
                        <x-card.popular-card
                            :title="$story['title']"
                            :cover="$story['covers'][0]['file_path'] ?? null"
                            :synopsis="$story['synopsis']"
                        />
                    @endforeach
                </div>
            </div>
        </div>


        @auth
            @if(isset($data['lastReading']))
                <div class="mt-6 md:hidden">
                    <x-section-title :title="'Continue To Reading'"/>
                    <div class="px-4">
                        <x-card.last-reading-card
                            :cover="$data['lastReading']['covers'][0]['file_url']"
                            :title="$data['lastReading']['title']"
                            :synopsis="\Illuminate\Support\Str::limit($data['lastReading']['synopsis'], 80)"
                        />
                    </div>
                </div>
            @endif
        @endauth

        <div class="mt-6 ">
            <span class="md:hidden">
                <x-section-title :title="'Library'"/>
            </span>
            <div class="grid grid-cols-2 md:grid-cols-3  px-4 gap-4 lg:gap-y-6 ">
                @foreach($data['stories'] as $story)
                    <x-card.story-card
                        :id="$story->id"
                        :covers="$story->covers"
                        :avatar="$story->user->avatar->file_url"
                        :title="$story->title "
                        :creator="$story->user->name"
                        :categories="$story->categories"

                    />
                @endforeach
            </div>
        </div>

    </section>

@endsection
