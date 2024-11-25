<div>
    <label for="{{$name}}" class="block mb-3 text-xs md:text-base text-neutral-400">Your {{$label}}</label>
    <input
        type="{{$type}}"
        id="{{$name}}"
        name="{{$name}}"
        class="bg-transparent text-base border border-neutral-300 text-neutral-500 w-full p-3 md:p-3 focus:outline-none  rounded-lg placeholder-neutral-300"
        placeholder="{{$placeholder}}"
        required
    />
</div>
