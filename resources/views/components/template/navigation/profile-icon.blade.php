<div>
    @if(Route::has('login'))
        @auth
            Logged in (asu)
        @else
            <div class="flex items-center gap-4">
                <a href="/login" class="px-6 py-2 font-medium rounded-lg border border-neutral-50/10 text-neutral-400">Login</a>
                <a href="/register" class="px-6 py-2 font-medium rounded-lg bg-primary">Register</a>
            </div>
        @endauth
    @endif
</div>
