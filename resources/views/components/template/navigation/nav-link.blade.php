<a
    {{ $attributes }}
    class="flex items-center text-lg font-medium gap-3 py-2 xl:py-3 px-4 rounded-lg {{$active ? 'bg-gradient-to-r from-primary to-red-700' : 'bg-transparent'}}"
    aria-current="{{$active ? 'page' : false}}"
>
    <span class="text-2xl">
        <i class='{{$icon}}'></i>
    </span>
    {{$title}}
</a>
