<a
    {{ $attributes }}
    class="navLink flex flex-col lg:flex-row w-fit lg:w-full items-center lg:gap-3 py-1 lg:py-2 px-2 lg:px-3 rounded-lg {{$active ? 'text-primary-100 font-medium lg:bg-primary-100/10 ' : 'text-neutral-500' }}"
    aria-current="{{$active ? 'page' : false}}"
>
    <span class="text-xl md:text-3xl lg:text-2xl ">
        <i class='{{$icon}}'></i>
    </span>
    <p class="text-[0.7rem] md:text-xs lg:text-sm xl:text-base lg:font-medium">
        {{$title}}
    </p>
</a>

