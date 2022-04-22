<x-guest-layout>
    <div class="relative px-2 md:px-3">
        @include('home.featured')

        <div class="my-6 mt-12">
            <h1 class="text-2xl text-center uppercase text-gray-600 dark:text-gray-400">
                {{ __('home.latest_news') }}
            </h1>
            <div class="text-center mb-5"><span
                    class="inline-block w-1 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
                <span class="inline-block w-3 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
                <span class="inline-block w-40 h-1 rounded-full bg-gray-600 dark:bg-gray-400 "></span>
                <span class="inline-block w-3 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
                <span class="inline-block w-1 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
            </div>

            <x-posts-grid :posts="$latestNews" />
        </div>

        <hr />

        <div class="my-6">
            <h1 class="text-2xl text-center uppercase text-gray-600 dark:text-gray-400">
                {{ __('home.latest_tutorials') }}
            </h1>
            <div class="text-center mb-5"><span
                    class="inline-block w-1 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
                <span class="inline-block w-3 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
                <span class="inline-block w-40 h-1 rounded-full bg-gray-600 dark:bg-gray-400 "></span>
                <span class="inline-block w-3 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
                <span class="inline-block w-1 h-1 rounded-full bg-gray-600 dark:bg-gray-400 ml-1"></span>
            </div>

            <x-posts-grid :posts="$latestTutorials" />
        </div>
    </div>
</x-guest-layout>
