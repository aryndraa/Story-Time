<form method="get" action="{{route('story.index')}}" class="flex gap-3 items-stretch">
    <input type="text" name="keyword" value="{{request('keyword')}}" class="bg-dark border border-neutral-50/5 rounded-lg h-12 w-72 px-4 focus:outline-none text-neutral-400">
    <button type="submit" class="bg-dark border border-neutral-50/5 px-3 text-2xl rounded-lg text-neutral-400">
        <i class='bx bx-search'></i>
    </button>

</form>
