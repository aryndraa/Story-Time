<a
    {{ $attributes }}
    class="navLink flex w-fit lg:w-full items-center text-lg font-medium gap-3 py-1 xl:py-3 px-2 lg:px-4 rounded-lg {{$active ? 'bg-neutral-900' : 'bg-transparent'}}"
    aria-current="{{$active ? 'page' : false}}"
>
    <span class="text-2xl">
        <i class='{{$icon}}'></i>
    </span>
    <p class="hidden lg:block">
        {{$title}}
    </p>
</a>

