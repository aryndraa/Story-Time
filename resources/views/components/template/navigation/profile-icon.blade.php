<div>

    @if(Route::has('login'))
        @auth
            <div class="flex items-stretch gap-2">


                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-3 ">
                        <div>
                            @if($user->avatar)
                                <img src="{{ $user->avatar->file_url }}" alt="" class="w-8 max-h-8 lg:w-10 lg:h-10 rounded-full object-cover">
                            @else
                                <div class="flex justify-center items-center capitalize w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-primary-100 text-white">
                                    {{ \Illuminate\Support\Str::charAt($user->username, 0) }}

                                </div>
                            @endif
                        </div>
                    </button>
                    <div
                        x-show="open"
                        @click.away="open = false"
                        class="absolute flex-col bg-dark w-64 right-0 mt-4  shadow-lg  z-20"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        style="display: none;"
                    >
                        <a href="/profile" class=" md:py-3 lg:py-3 md:px-4 lg:px-5 text-sm xl:text-base bg-gradient-to-br from-primary-100 to-primary-100/80 text-white font-medium flex justify-between items-center">
                            Upgrade Premium
                            <span class="text-2xl text-amber-400">
                                <i class='bx bxs-crown'></i>
                            </span>
                        </a>
                        <a href="/" class=" md:py-3 lg:py-3 md:px-4 lg:px-5 text-sm xl:text-base hover:bg-primary-100/10  text-neutral-500 font-medium flex justify-between items-center">
                            My Activity
                            <span class="text-2xl text-neutral-500">
                               <i class='bx bx-line-chart' ></i>
                            </span>
                        </a>
                        <a href="/" class=" md:py-3 lg:py-3 md:px-4 lg:px-5 text-sm xl:text-base hover:bg-primary-100/10  text-neutral-500 font-medium flex justify-between items-center">
                            Option
                            <span class="text-2xl text-neutral-500">
                               <i class='bx bx-cog' ></i>
                            </span>
                        </a>
                        <a href="{{route('logout')}}" class=" md:py-3 lg:py-3 md:px-4 lg:px-5 text-sm xl:text-base hover:bg-red-50 group text-neutral-500 hover:text-red-600 font-medium flex justify-between items-center">
                            Log Out
                            <span class="text-2xl text-neutral-500 group-hover:text-red-600">
                               <i class='bx bx-log-out' ></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="flex items-center gap-2 lg:gap-4 text-sm lg:text-base">
                <a href="/login" class="px-3 lg:px-6 py-2 lg:font-medium rounded-lg border border-neutral-300 text-neutral-400">Login</a>
                <a href="/register" class="px-3 lg:px-6 py-2 lg:font-medium rounded-lg bg-primary-100 text-white">Register</a>
            </div>
        @endauth
    @endif
</div>
