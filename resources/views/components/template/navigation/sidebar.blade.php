<div class="fixed top-0 bottom-0 z-50 left-0 w-64 min-h-screen bg-dark border-r border-neutral-50/5">
    <div class="flex flex-col gap-5">
        <div class="flex justify-center w-full py-6 border-b border-neutral-50/5">
            <x-template.logo/>
        </div>
        <div class="px-5">
            <h2 class="text-neutral-600  text-sm mb-4">
                Menu
            </h2>
            <div class="flex flex-col gap-2 xl:gap-3">
                <x-template.navigation.nav-link href="{{route('story.index')}}" :active="request()->is('/')" :icon="'bx bxs-compass'" :title="'Browse'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bxs-category'" :title="'Catalog'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bx-trending-up'" :title="'Trending'"/>
                <x-template.navigation.nav-link href="#" :active="request()->is('/test')" :icon="'bx bx-calendar'" :title="'Schedule'"/>
            </div>
        </div>
        <div class="px-5">
            <h2 class="text-neutral-600  text-sm mb-4">
                History
            </h2>
        </div>
    </div>
</div>
