<div>
    <button class="text-2xl text-slate-500 md:hidden" onclick="toggleSearch()">
        <i class='bx bx-search'></i>
    </button>
    <div id="searchBar" class="absolute md:relative hidden md:flex inset-0 bg-white z-20 items-center justify-end px-6 py-8 md:py-0  md:px-0 gap-4 md:gap-12 lg:gap-0">
        <button type="button" onclick="toggleSearch()" class="text-2xl text-neutral-400 md:hidden">
            <i class='bx bx-arrow-back'></i>
        </button>
        <form action="" class="flex-1  md:w-[25rem] lg:w-[26rem] flex gap-2 md:gap-3 lg:gap-2">
            <input
                type="text"
                placeholder="Search book"
                class="w-full text-base px-4 py-1.5 md:py-2.5 focus:outline-none rounded-lg border border-neutral-300 text-neutral-500"
            >
            <button class="min-h-full flex text-neutral-400 border border-neutral-300 rounded-lg items-center px-2 md:px-3 text-xl">
                <i class='bx bx-search-alt' ></i>
            </button>
        </form>
    </div>
</div>
<div id="searchOverlay" class="bg-black/20 absolute hidden inset-0 min-h-screen"></div>

<script>
    function toggleSearch() {
        const searchBar = document.getElementById('searchBar');
        const searchOverlay = document.getElementById('searchOverlay');
        searchBar.classList.toggle('flex');
        searchBar.classList.toggle('hidden');
        searchOverlay.classList.toggle('hidden');
    }
</script>
