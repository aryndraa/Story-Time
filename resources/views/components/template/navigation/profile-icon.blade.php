<div>
    @if(Route::has('login'))
        @auth
            <div class="flex items-stretch gap-2">
                <div class="flex items-center gap-3 border p-2 px-4 border-neutral-50/5">
                    <div>
                        @if($user->avatar)
                            <img src="{{ $user->avatar->file_url }}" alt="" class="w-8 max-h-8 rounded-full object-cover">
                        @else
                            <div class="flex justify-center items-center capitalize w-8 h-8 rounded-full bg-primary/10">
                                {{ \Illuminate\Support\Str::charAt($user->username, 0) }}

                            </div>
                        @endif
                    </div>
                    <p class="font-medium text-neutral-400">
                        {{ $user->username }}
                    </p>
                </div>

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="border border-neutral-50/5 h-full px-3 text-2xl text-neutral-400">
                        <i class='bx bx-menu'></i>
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
                        <a href="/profile" class=" py-4 px-6 hover:bg-neutral-900  text-neutral-500 font-medium flex justify-between items-center">
                            Profile
                            <span class="text-2xl text-neutral-500">
                                <i class='bx bx-user-circle'></i>
                            </span>
                        </a>
                        <a href="/" class=" py-4 px-6 hover:bg-neutral-900  text-neutral-500 font-medium flex justify-between items-center">
                            Your Activity
                            <span class="text-2xl text-neutral-500">
                               <i class='bx bx-line-chart'></i>
                            </span>
                        </a>
                        <a href="{{route('toAccount')}}" class=" py-4 px-6 hover:bg-neutral-900  text-neutral-500 font-medium flex justify-between items-center">
                            Account
                            <span class="text-2xl text-neutral-500">
                                <i class='bx bx-cog' ></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="hidden lg:flex items-center gap-2 lg:gap-4 text-sm lg:text-base">
                <a href="/login" class="px-3 lg:px-6 py-2 lg:font-medium rounded-lg border border-neutral-50/10 text-neutral-400">Login</a>
                <a href="/register" class="px-3 lg:px-6 py-2 lg:font-medium rounded-lg bg-primary">Register</a>
            </div>
            <div x-data="{ open: false }" class="h-full">
                <button @click="open = !open" class="h-full  text-2xl text-neutral-400">
                    <i class='bx bx-menu'></i>
                </button>
                <div
                    x-show="open"
                    @click.away="open = false"
                    class="absolute flex flex-col bg-dark w-40 right-6 mt-4 py-2  shadow-lg  z-20 text-sm"
                >
                        <a href="/login" class="px-4 lg:px-6 py-3  lg:font-medium  text-neutral-400">Login</a>
                        <a href="/register" class="px-4 lg:px-6 py-3 lg:font-medium text-neutral-400">Register</a>
                </div>
            </div>
        @endauth
    @endif
</div>
