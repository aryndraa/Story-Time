@extends('layout')
@section('content')
    <div class="min-h-[200vh] justify-center ">
        <section>
            <x-browse.slider/>
        </section>
        <section class="px-10 py-6">
            <div class="flex items-center gap-2 mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">
                <span class="text-amber-400 text-2xl">
                    <i class='bx bx-time-five' ></i>
                </span>
                <h1 class="text-xl">
                    Latest Stories
                </h1>
            </div>
            <div class="swiper latestStories w-full">
                <div class="swiper-wrapper items-stretch ">
                    @foreach($data['newStories'] as $story)
                        <x-card.story-card :cover="$story->covers[0]->file_url" :cover2="$story->covers[1]->file_url ?? null" :title="\Illuminate\Support\Str::limit($story->title, 25)" :category="$story->storyCategory->name"/>
                    @endforeach
                        <x-card.more-card/>

                </div>
            </div>
        </section>
        <section class="py-12 px-10">
            <h1 class="text-2xl mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">Best For You</h1>
            <div class="grid grid-cols-4 gap-4">
                @foreach(array_slice($data['stories'], 0, 12) as $story)
                    <x-card.story-card
                        :cover="$story['covers'][0]['file_path']"
                        :cover2="$story['covers'][1]['file_path'] ?? null"
                        :title="\Illuminate\Support\Str::limit($story['title'], 25)"
                        :category="$story['category']['name']"
                    />
                @endforeach
            </div>
        </section>
        <section class="py-12 px-10">
            <div class="flex gap-2  mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">
                <span class="text-2xl text-amber-400"><i class='bx bxs-hot'></i></span>
                <h1 class="text-2xl">Hot Stories</h1>
            </div>
            <div class="swiper hotStories w-full">
                <div class="swiper-wrapper items-stretch ">
                    @foreach(array_slice($data['stories'], 0, 4) as $story)
                        <x-card.popular-card
                            :title="$story['title']"
                            :cover="$story['covers'][0]['file_path']"
                            :synopsis="$story['synopsis']"
                        />
                    @endforeach
                </div>
            </div>
        </section>
        <section class="py-12 px-10">
            <div class="pb-8">
                <h1 class="text-2xl mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">
                    Popular Horror
                </h1>
                <div class="swiper latestStories w-full">
                    <div class="swiper-wrapper flex items-stretch">
                        @foreach($data['stories'] as $story)
                            @if($story['category']['name'] == 'horror')
                                <x-card.story-card
                                    :cover="$story['covers'][0]['file_path']"
                                    :cover2="$story['covers'][1]['file_path'] ?? null"
                                    :title="\Illuminate\Support\Str::limit($story['title'], 25)"
                                    :category="$story['category']['name']"
                                />
                            @endif
                      @endforeach
                            <x-card.more-card/>
                    </div>
                </div>
            </div>
            <div class="py-8">
                <h1 class="text-2xl mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">
                    Popular Adventure
                </h1>
                <div class="swiper latestStories w-full">
                    <div class="swiper-wrapper">
                        @foreach($data['stories'] as $story)
                            @if($story['category']['name'] == 'adventure')
                                <x-card.story-card
                                    :cover="$story['covers'][0]['file_path']"
                                    :cover2="$story['covers'][1]['file_path'] ?? null"
                                    :title="\Illuminate\Support\Str::limit($story['title'], 25)"
                                    :category="$story['category']['name']"
                                />
                            @endif
                      @endforeach
                            <x-card.more-card/>

                    </div>
                </div>
            </div>
            <div class="pt-8">
                <h1 class="text-2xl mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">
                    Popular Fantasy
                </h1>
                <div class="swiper latestStories w-full">
                    <div class="swiper-wrapper">
                        @foreach($data['stories'] as $story)
                            @if($story['category']['name'] == 'fantasy')
                                <x-card.story-card
                                    :cover="$story['covers'][0]['file_path']"
                                    :cover2="$story['covers'][1]['file_path'] ?? null"
                                    :title="\Illuminate\Support\Str::limit($story['title'], 25)"
                                    :category="$story['category']['name']"
                                />
                            @endif
                      @endforeach
                            <x-card.more-card/>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-8 px-10">
            <h1 class="text-2xl mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">
                Most Popular Category
            </h1>
            <div class="grid grid-cols-5 gap-4">
                @foreach($data['categories'] as $category)
                    <x-card.category-card
                        :name="$category['name']"
                    />
                @endforeach
            </div>
        </section>
        <section class="py-12 px-10">
            <h1 class="text-2xl mb-6 py-4 border-b border-b-neutral-50/5  border-l-2 border-primary pl-5">All Story</h1>
            <div class="grid grid-cols-4 gap-4">
                @foreach($data['stories'] as $story)
                    <x-card.story-card
                        :cover="$story['covers'][0]['file_path']"
                        :cover2="$story['covers'][1]['file_path'] ?? null"
                        :title="\Illuminate\Support\Str::limit($story['title'], 25)"
                        :category="$story['category']['name']"
                    />
                @endforeach
            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper(".latestStories", {
                slidesPerView: 3.9,
                spaceBetween: 8,
                loop: false,
            });

            const hot = new Swiper(".hotStories", {
                slidesPerView: 1.2,
                spaceBetween: 12,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                }
            });
        });

    </script>

@endsection
