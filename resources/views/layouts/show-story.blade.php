
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        {{--  Title  --}}
        <title>{{$data['title']}} / StoryMedia</title>

        {{--  Tailwind  --}}
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

        {{--  CDN Icon  --}}
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />
    </head>
    <body class="md:ml-24 lg:ml-56 xl:ml-64 ">

    {{--  Sidebar  --}}
    <x-template.navigation.navbar/>

    {{--  Main Content  --}}
    <section>
        <div class="relative">
            <div class="absolute inset-0 h-[36vh] bg-gradient-to-t from-white to-transparent"></div>
            <img src="{{$data['story']->covers[0]->file_url}}" alt="" class="w-full h-[35vh] object-cover">
        </div>
        <div class="mx-4 py-6 ">
            <div class="flex gap-2 items-center text-sm mb-2 text-slate-500">
                <a href="{{route('story.index')}}">Home</a>
                <span> > </span>
                <a href="{{route('story.show.overview', $data['story']->id)}}">{{$data['story']->title}}</a>
            </div>
            <h1 class="text-2xl font-medium text-slate-700 mb-2">{{$data['story']->title}}</h1>
            <div class="flex items-center gap-2 mb-4">
                <img src="{{$data['story']->user->avatar->file_url}}" alt="" class="w-6 h-6 object-cover rounded-full">
                <p class="text-sm font-medium text-slate-600">{{$data['story']->user->name}}</p>
            </div>
            <div class="flex items-center gap-4 mb-4">
                <div class="flex gap-2 items-center text-slate-600">
                    <span>
                        <i class='bx bxs-heart'></i>
                    </span>
                    <p class="text-slate-600" >
                        {{$data['story']->story_likes_count }} Likes
                    </p>
                </div>
                <div class="flex gap-2 items-center text-slate-600">
                    <span>
                        <i class='bx bxs-show'></i>
                    </span>
                    <p class="text-slate-600">
                        {{$data['story']->views_count}} Views
                    </p>
                </div>

            </div>
            <div class="flex gap-2">
                @foreach($data['story']->categories as   $category)
                    <a href="#" class="text-xs p-2 rounded-lg bg-slate-100 text-slate-500">
                        {{$category->name}}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="mx-4">
            <div class="flex gap-5 items-center py-4 border-y mb-4 border-slate-200 ">
                <a
                    href="{{route('story.show.overview', $data['story']->id)}}" class="font-medium {{request()->is($data['story']->id .'/overview') ? "text-primary-100" : "text-slate-600"}} "
                    aria-current="{{request()->is($data['story']->id .'/overview') ? 'page' : false}}"
                >
                    Overview
                </a>
                <a
                    href="{{route('story.show.chapters', $data['story']->id)}}"
                    class="font-medium flex items-center gap-2  {{request()->is($data['story']->id .'/chapters') ? "text-primary-100" : "text-slate-600"}}"
                    aria-current="{{request()->is($data['story']->id .'/chapters') ? 'page' : false}}"

                >
                    <span class="py-0.5 px-2 flex items-center text-sm justify-center rounded-full {{request()->is($data['story']->id .'/chapters') ? "bg-primary-100/10" : "bg-slate-100 "}}">
                        {{$data['story']->chapters_count}}
                    </span>
                    Chapters
                </a>
                <a
                    href="#"
                    class="font-medium  {{request()->is($data['story']->id .'/others') ? "text-primary-100" : "text-slate-600"}} "
                    aria-current="{{request()->is($data['story']->id .'/others') ? 'page' : false}}"

                >
                    Others Book
                </a>
            </div>
            <div class="pb-24">
                @yield('main')
            </div>
        </div>
    </section>


    {{--  Footer  --}}
    {{--    <x-template.footer/>--}}

    {{--  script  --}}
    @vite('resources/js/app.js')
    </body>
    </html>
