<div class="swiper-slide">
    <div class="min-h-[32vh] w-full relative ">
        <img src="{{$cover}}" alt="" class="absolute inset-0 h-full w-full object-cover "/>
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent "></div>
        <div class="mt-2 absolute z-10 p-4 inset-0 flex flex-col justify-end">
            <h1 class="font-medium text-xl text-white">
                {{$title}}
            </h1>
            <p class="text-white text-xs font-light">
                {{$synopsis}}
            </p>
            <div class="mt-2">
                <a href="" class="text-white bg-primary-100 w-fit text-sm px-2 py-1 rounded-lg">
                    View Book
                </a>
            </div>
        </div>
    </div>
</div>
