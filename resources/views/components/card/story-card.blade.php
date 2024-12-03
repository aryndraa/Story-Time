<div class="">
    <div class="relative min-h-[24vh] mb-2">
        <img src="{{$cover}}" alt="" class="w-full h-[28vh] object-cover">
    </div>
    <div class="flex">
        <div class="hidden">
            <img src="{{$avatar}}" alt="" class=" rounded-full w-[2.2rem] h-[2rem]">
        </div>
        <div>
            <h1 class="text-sm text-slate-800 ">

                {{$title}}
            </h1>
            <p class="hidden">
                {{$creator}}
            </p>
            <div class="hidden">
                @foreach($categories as $category)
                    <p class="text-xs">
                        {{$category->name}}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
