<div class="swiper-slide">
    <div class="min-h-[32vh] md:min-h-[24vh] lg:min-h-[44vh] w-full relative ">
        <img src="{{$cover}}" alt="" class="absolute inset-0 h-full w-full object-cover rounded-lg"/>
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent rounded-lg"></div>
        <div class="mt-2 absolute z-10 p-4 md:p-6  inset-0 flex flex-col justify-end">
            <h1 class="font-medium text-xl md:text-3xl text-white">
                {{$title}}
            </h1>
            <p class="text-white text-xs md:text-sm md:w-[70%] font-light">
                {{$synopsis}}
            </p>
            <div class="mt-2 md:mt-4">
                <a href="" class="text-white bg-primary-100 w-fit text-sm px-2 py-1 md:px-3 md:py-2 rounded-lg">
                    View Book
                </a>
            </div>
        </div>
    </div>
</div>
