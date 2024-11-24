<div
    id="sidebar"
    class="fixed lg:top-0 bottom-0 w-full z-50 left-0 lg:w-64 lg:min-h-screen bg-dark border-r py-4 lg:py-0 border-neutral-50/5 "
>
    <div class="flex flex-col gap-5">
        <div class="hidden lg:flex justify-center w-full py-6 border-b border-neutral-50/5">
            <x-template.logo/>
        </div>
        <div class="px-7 lg:px-5">
            <h2 class="text-neutral-600  text-sm mb-4 hidden lg:block">
                Menu
            </h2>
            <div class="flex lg:flex-col lg:gap-2 justify-between xl:gap-3">
                <x-template.navigation.nav-link href="{{route('story.index')}}" :active="request()->is('/')" :icon="'bx bxs-compass'" :title="'Browse'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bxs-category'" :title="'Catalog'"/>
                <a
                    href="/"
                    class="flex lg:hidden  w-fit lg:w-full items-center text-lg font-medium gap-3 py-2  px-3  bg-primary rounded-full "

                >
                    <span class="text-2xl">
                       <i class='bx bx-search'></i>
                    </span>
                </a>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bx-trending-up'" :title="'Trending'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bx-calendar'" :title="'Schedule'"/>
            </div>
        </div>
        <div class="px-5 hidden">
            <h2 class="text-neutral-600  text-sm mb-4">
                History
            </h2>
        </div>
    </div>
</div>
