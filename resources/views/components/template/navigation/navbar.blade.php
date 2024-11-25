<div
    id="sidebar"
    class="fixed  md:top-0 bottom-0 w-full z-50 md:z-[-1] left-0 md:w-24 lg:w-56 xl:w-64 lg:min-h-screen bg-white border-r py-3 lg:py-0 border-neutral-50/5 "
>
    <div class="flex flex-col md:items-center lg:items-start w-full  gap-5">
        <div class="hidden lg:flex justify-center w-full py-6 border-b border-neutral-50/5">
            <x-template.logo/>
        </div>
        <div class="py-4 justify-center hidden md:flex lg:hidden ">
            <img src="{{ asset('assets/icon.svg') }}" alt="Logo" class="h-7 md:h-8">
        </div>
        <div class="px-4 md:px-0 lg:px-5 lg:w-full">
            <h2 class="text-neutral-400 font-medium  text-sm mb-4 hidden lg:block">
                Menu
            </h2>
            <div class="flex md:flex-col md:w-full md:items-center md:gap-8 justify-between lg:gap-3 ">
                <x-template.navigation.nav-link href="{{route('story.index')}}" :active="request()->is('/')" :icon="'bx bxs-compass'" :title="'Browse'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bxs-category'" :title="'Catalog'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bxs-book'" :title="'My Book'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bx-trending-up'" :title="'Trending'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bxs-user-circle'" :title="'Account'"/>
            </div>
        </div>
        <div class="px-5 hidden">
            <h2 class="text-neutral-600  text-sm mb-4">
                History
            </h2>
        </div>
    </div>
</div>
