<x-guest-layout>
    <div class="relative px-2 md:px-3">
        @include('home.featured')

        <div class="my-6 mt-12">
            <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
                <h1 class="text-3xl text-center uppercase text-gray-600 dark:text-gray-400">
                    {{ __('home.latest_news') }}
                </h1>

                <a href="/c/news" class="px-3 py-1 rounded cursor-pointer border btn">
                    {{ __('home.view_all') }}
                </a>
            </div>
            <x-posts-grid :posts="$latestNews" />
        </div>

        <hr />

        <div class="my-6">
            <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
                <h1 class="text-3xl text-center uppercase text-gray-600 dark:text-gray-400">
                    {{ __('home.latest_tutorials') }}
                </h1>

                <a href="/c/tutorials" class="px-3 py-1 rounded cursor-pointer border btn">
                    {{ __('home.view_all') }}
                </a>
            </div>

            <x-posts-grid :posts="$latestTutorials" />
        </div>
    </div>
</x-guest-layout>
