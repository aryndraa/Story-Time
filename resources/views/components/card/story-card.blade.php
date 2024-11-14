    <div class="p-4  border flex-1 border-neutral-50/5 min-w-64 flex flex-col  group cursor-pointer swiper-slide  ">
    <div class="min-w-full h-56 max-h-56 overflow-hidden relative self-center ">
        <div class="absolute inset-0 {{$cover2 == null ? 'group-hover:bg-dark/50' : ''}}  z-20 transition duration-300 rel"></div>
        @if($cover2 == null)
            <img src="{{$cover}}" alt="" class="hover:hidden w-full max-h-56  object-cover transform group-hover:scale-110 transition duration-300 ">
        @else
            <img src="{{$cover}}" alt="" class="group-hover:opacity-0 w-full max-h-56  object-cover transform group-hover:scale-110 transition duration-300 ">
            <img src="{{$cover2}}" alt="" class="absolute top-0 opacity-0 group-hover:opacity-100 w-full max-h-56  object-cover transform group-hover:scale-110 transition duration-300 ">
        @endif
    </div>
    <div class="mt-2">
        <h1 class="text-base  text-neutral-500 mb-4 hover:text-red-700 hover:underline">{{$title}}</h1>
        <strong class="text-sm text-neutral-500 font-normal bg-neutral-900 px-4 py-1 capitalize">
            {{$category}}
        </strong>
    </div>
</div>
