<div>
    <button class="text-2xl text-slate-500" onclick="toggleSearch()">
        <i class='bx bx-search'></i>
    </button>
    <div id="searchBar" class="absolute hidden inset-0 bg-white z-20 items-center justify-end px-6 gap-4">
        <button type="button" onclick="toggleSearch()" class="text-2xl text-neutral-400">
            <i class='bx bx-arrow-back'></i>
        </button>
        <form action="" class="flex-1 flex gap-2">
            <input
                type="text"
                placeholder="Search book"
                class="w-full text-base px-4 py-2.5 focus:outline-none rounded-lg border border-neutral-300 text-neutral-500"
            >
            <button class="min-h-full flex text-neutral-400 border border-neutral-300 rounded-lg items-center px-2 text-xl">
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
