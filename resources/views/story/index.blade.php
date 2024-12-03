@extends('layouts.app')
@section('content')
    <section class="min-h-[200vh]">
        <x-profile-banner/>
        <div class="w-full mt-6 ">
            <x-section-title :title="'Popular Book'"/>
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

                <div class="mt-6">
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
            <div class=" w-full swiper categories  mx-auto mb-6 ">
                <div class="swiper-wrapper ">
                    @foreach($data['categories'] as $category)
                        <div class="swiper-slide min-w-fit">
                            <a href="/"
                               class="flex items-center justify-center text-sm font-medium text-slate-500 ">
                                {{$category['name']}}
                            </a>
                        </div>
                    @endforeach
                    <div class="swiper-slide ">
                        <a href="/"
                           class="text-sm font-medium flex items-center justify-center text-slate-500">
                            More
                        </a>
                    </div>
                </div>
            </div>

            <x-section-title :title="'Library'"/>
            <div class="grid grid-cols-2 px-4 gap-4 ">
                @foreach($data['stories'] as $story)
                    <x-card.story-card
                        :cover="$story->covers[0]->file_url"
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
