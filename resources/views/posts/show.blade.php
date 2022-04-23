<x-blog-layout>
    <div class="relative max-w-full">
        <img src="{{ $post->img }}" class="object-cover max-w-full rounded-2xl h-96 md:h-[30rem]" />
        <div
            class="absolute bottom-0 px-2 mb-2 mr-2 text-xs font-medium text-gray-100 bg-yellow-500 rounded-lg ltr:left-10 rtl:right-10">
            <i class="fas fa-clock"></i>
            <span>{{ $post->updated_diff }}</span>
        </div>
    </div>
    <h1 class="py-4 text-2xl text-gray-700 dark:text-gray-500">
        {{ $post->title }}
    </h1>

    <p class="post-body">
        {!! $post->body !!}
    </p>
</x-blog-layout>
