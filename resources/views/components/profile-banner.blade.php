<div class="md:hidden  pt-16 px-4 ">
    <div class=" flex items-center gap-3 ">
         @auth
            <div class="w-12 h-12 ">
                @if($user->avatar)
                    <img src="{{ $user->avatar->file_url }}" alt="" class="rounded-full w-full h-full">
                @else
                    <div class="flex justify-center items-center h-full rounded-full border border-white text-lg font-semibold text-neutral-600 bg-white">
                        {{ \Illuminate\Support\Str::charAt($user->username, 0) }}

                    </div>
                @endif
            </div>
            <div class="">
                <h1 class="text-lg  leading-[1.3] mb-1 font-medium">{{$user->username}}!</h1>
                <p class="text-sm " >Upgrade to <a href="/" class="text-primary-100">Premium</a> </p>
            </div>
        @else
            <div class="w-12 h-12 rounded-full border  border-neutral-400 text-neutral-600  flex items-center justify-center text-2xl ">
                <i class='bx bx-user'></i>
            </div>
            <div class="">
                <h1 class="text-lg leading-[1.3] font-medium text-slate-800">Welcome To Story Time!</h1>
                <a class="text-sm font-medium text-primary-100" href="{{ route('login') }}">Get Started</a>
            </div>
        @endauth
    </div>

</div>
