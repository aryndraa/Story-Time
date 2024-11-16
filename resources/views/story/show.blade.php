@extends('layout')

@section('content')
    <section>
        <div class="w-full max-h-[30rem] relative ">
            <img src="{{$data['story']->covers[0]->file_url}}" alt="" class="w-full max-h-[30rem] object-cover ">
            <div class="absolute bg-gradient-to-b from-dark/20 to-dark/80 h-full top-0 bottom-0 left-0 right-0 min-h-[30.1rem]"></div>
        </div>
        <div class="px-10">
            <div class="p-6 bg-gradient-to-r from-dark to-neutral-900 -translate-y-24 ">
                <div class="flex ">
                    <div class="min-w-56 max-w-56">
                        <img src="{{$data['story']->covers[0]->file_url}}" alt="" class="w-full h-80 object-cover">
                    </div>
                    <div class="h-fit  w-full py-4 px-10 ">
                        <div class="flex items-start justify-between border-b border-neutral-50/5 pb-6 mb-6">
                            <div>
                                <h1 class="text-3xl font-medium  mb-8 leading-[1.4]"   >{{$data['story']->title}}</h1>
                                <div class="flex gap-3 items-stretch">
                                    <strong class="flex items-center text-neutral-500 font-normal bg-neutral-900 px-4 py-1 capitalize">
                                        {{$data['story']->storyCategory->name}}
                                    </strong>
                                    <strong class="flex items-center text-neutral-500 font-normal bg-neutral-900 px-4 py-1 capitalize">
                                        {{$data['story']->chapters_count}} Chapters
                                    </strong>
                                    <strong class=" text-neutral-500 font-normal bg-neutral-900 px-4 py-1 capitalize flex items-center gap-2">
                                        <span class="text-primary text-xl"><i class='bx bxs-heart'></i></span> {{$data['story']->story_likes_count}}
                                    </strong>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <form action="{{route('like')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="story_id" value="{{$data['story']->id}}">
                                    @if($data['story']->has_liked)
                                        <button type="submit" class="p-4 py-3 text-neutral-400  border rounded-lg border-neutral-50/5 flex items-center gap-3">
                                            <span class="text-xl flex">
                                                <i class='bx bxs-heart'></i>
                                            </span>
                                            Remove Like
                                        </button>
                                    @else
                                        <button type="submit"  class="p-4 py-3 text-neutral-400  border rounded-lg border-neutral-50/5 flex items-center gap-3">
                                            <span class="text-xl flex">
                                                <i class='bx bx-heart'></i>
                                            </span>
                                             Like Story
                                        </button>
                                    @endif
                                </form>

                                <form action="{{route('bookmark')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="story_id" value="{{$data['story']->id}}">
                                    @if($data['story']->has_bookmarked)
                                        <button type="submit" class="p-4 text-neutral-400 text-xl  border rounded-full border-neutral-50/5 flex">
                                            <i class='bx bxs-bookmark'></i>
                                        </button>
                                    @else
                                        <button type="submit" class="p-4 text-neutral-400 text-xl  border rounded-full border-neutral-50/5 flex">
                                            <i class='bx bx-bookmark'></i>
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div>
                            <p id="synopsis" class="text-neutral-500 font-light  ">
                                {!! nl2br(e(Str::limit($data['story']->synopsis, 300, '...'))) !!}
                            </p>
                            <button id="toggle-read-more" class="text-primary font-light ">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const synopsis = document.getElementById('synopsis');
            const toggleButton = document.getElementById('toggle-read-more');
            const fullText = `{!! nl2br(e($data['story']->synopsis)) !!}`; // Teks lengkap
            const shortText = `{!! nl2br(e(Str::limit($data['story']->synopsis, 300, '...'))) !!}`; // Teks pendek

            let isExpanded = false;

            toggleButton.addEventListener('click', function () {
                if (isExpanded) {
                    synopsis.innerHTML = shortText;
                    toggleButton.textContent = 'Read More';
                } else {
                    synopsis.innerHTML = fullText;
                    toggleButton.textContent = 'Read Less';
                }
                isExpanded = !isExpanded;
            });
        });
    </script>
@endsection
