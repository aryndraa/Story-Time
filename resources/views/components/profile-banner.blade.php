<div class="md:hidden pt-16 px-4 ">
    <div class="border border-neutral-300 rounded-full flex items-center gap-3 p-4  ">
         @auth
            <div class="w-12 h-12 ">
                @if($user->avatar)
                    <img src="{{ $user->avatar->file_url }}" alt="" class="rounded-full w-full h-full">
                @else
                    <div class="flex justify-center items-center h-full rounded-full border border-neutral-600 text-lg text-neutral-600">
                        {{ \Illuminate\Support\Str::charAt($user->username, 0) }}

                    </div>
                @endif
            </div>
            <div class="">
                <h1 class="text-lg leading-[1.4] mb-1 font-medium">Welcome Back, {{$user->username}}!</h1>
                <p class="text-sm text-neutral-400" >Upgrade to <a href="/" class="text-primary-100">Premium</a> </p>
            </div>
        @else
            <div class="w-12 h-12 rounded-full border border-neutral-600 flex items-center justify-center text-2xl text-neutral-600">
                <i class='bx bx-user'></i>
            </div>
            <div class="">
                <h1 class="text-base leading-[1.5] font-medium">Welcome To Story Time!</h1>
                <a class="text-sm font-medium text-primary-100" href="{{ route('login') }}">Get Started</a>
            </div>
        @endauth
    </div>

</div>
