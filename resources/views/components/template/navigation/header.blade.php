<div class="px-4 md:px-6 lg:px-8 py-3 lg:py-4 bg-white flex justify-between items-center fixed top-0 left-0 md:left-24 lg:left-56 xl:left-64 right-0 z-[9999] md:border-b">
    <div class="flex lg:gap-12 justify-between items-center w-full  md:w-full lg:w-full">
        <div class="md:hidden">
            <x-template.logo/>
        </div>
        <x-template.navigation.search-bar/>
        <div class="hidden md:flex items-center gap-5 lg:gap-10">
            @auth
                <a href="#" class="text-2xl   text-neutral-600 lg:text-neutral-400 "><i class=' bx bx-cart-alt' ></i></a>
                <a href="#" class="text-2xl   text-neutral-600 lg:text-neutral-400 "><i class=' bx bx-heart' ></i></a>
            @endauth
            <x-template.navigation.profile-icon/>
        </div>
    </div>
</div>
