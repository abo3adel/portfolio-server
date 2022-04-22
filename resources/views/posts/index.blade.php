<x-blog-layout>
@empty($posts->items())
    <div class="p-3 text-center w-3/4 mx-auto">
        <i class="fas fa-blog fa-10x text-gray-500 dark:text-gray-700 pb-7"></i>
        <p class="text-xl font-blod text-orange-700 dark:text-orange-500 p-2">
            {{ __('blog.empty') }}
        </p>
    </div>
    @endempty

    <x-posts-grid :posts="$posts" />    

    <div class="pagination py-8 px-2">
        {{ $posts->withQueryString()->links() }}
    </div>
</x-blog-layout>
