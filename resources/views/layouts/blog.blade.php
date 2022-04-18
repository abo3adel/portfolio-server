<x-guest-layout>
    <div class="flex flex-row flex-wrap">
        <div class="w-full md:w-4/5 p-2">
            {{$slot}}
        </div>
        <div class="w-full md:w-1/5 p-2">
            <x-blog.search-bar />
        </div>
    </div>
</x-guest-layout>