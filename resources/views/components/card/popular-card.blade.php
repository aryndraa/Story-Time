<div class=" p-6 swiper-slide  border border-neutral-50/5 group">
    <div class="relative min-h-[45vh overflow-hidden">
        <div>
            <div>
                <img src="{{$cover}}" alt="" class="w-full h-[45vh] object-cover absolute inset-0 -z-20 transform group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-r from-dark/90 to-dark/10 -z-10"></div>
            </div>
            <div class="flex flex-col justify-end min-h-[45vh] p-6">
                <div class="max-w-[25rem]">
                    <h1 class="text-white text-3xl font-medium">{{$title}}</h1>
                    <p class="text-sm text-neutral-300">{{$synopsis}}</p>
                    <div class="mt-2">
                        <a href="#" class="text-primary hover:underline">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
