<div class="">
    <div class="relative  mb-2 overflow-hidden group">
        @if(count($covers) > 1)
            <img src="{{$covers[0]->file_url}}" alt="" class="w-full h-[28vh] md:h-[24vh] lg:h-[28vh] object-cover rounded-lg transition ease-in-out duration-300 transform group-hover:opacity-0">
            <img src="{{$covers[1]->file_url}}" alt="" class="absolute inset-0 w-full h-[28vh] md:h-[24vh] lg:h-[28vh] object-cover rounded-lg transition ease-in-out duration-300 transform opacity-0  group-hover:opacity-100 group-hover:scale-110 group-hover:brightness-50">
        @else
            <img src="{{$covers[0]->file_url}}" alt="" class="w-full h-[28vh] md:h-[24vh] lg:h-[28vh] object-cover rounded-lg transition ease-in-out duration-300 transform group-hover:scale-110 group-hover:brightness-50">
        @endif
    </div>
    <div class="flex">

        <div>
            <a href="{{route('story.show.overview', $id)}}" class="text-base md:text-lg text-slate-800  hover:text-primary-100  transition ease-in-out  ">

                {{$title}}
            </a>
            <a href="/" class="flex items-center gap-2 w-fit mb-4 mt-1  ">
                <div class="">
                    <img src="{{$avatar}}" alt="" class=" rounded-full w-[16px] lg:w-[1.4rem] h-[16px] lg:h-[1.4rem]">
                </div>
                <p class="block text-slate-800 text-xs md:text-sm ">
                    {{$creator}}
                </p>
            </a>
            <div class="flex-wrap flex gap-2">
                @foreach($categories as $category)
                    <p class="text-xs bg-slate-100 p-1 px-2 rounded-lg text-slate-600">
                        {{$category->name}}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
