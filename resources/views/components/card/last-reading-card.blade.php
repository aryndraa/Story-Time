<div class="flex md:hidden gap-2">
    <div class="min-h-[18vh] lg:min-h-[40vh] max-w-[30%] relative flex-1">
        <img src="{{$cover}}" alt="" class="absolute inset-0 h-full w-full object-cover rounded-lg    "/>
{{--        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent "></div>--}}
    </div>
    <div class="flex-1 flex flex-col gap-1">
        <div>
            <h1 class="font-medium text-base ">
                {{$title}}
            </h1>
            <p class="text-xs font-light">
                {{$synopsis}}
            </p>
        </div>
        <div class="">
            <a href="" class="text-primary-100 w-fit text-sm flex  rounded-full font-medium">
                Continue Reading
{{--                <i class='bx bxs-right-arrow'></i>--}}
            </a>
        </div>
    </div>
</div>
