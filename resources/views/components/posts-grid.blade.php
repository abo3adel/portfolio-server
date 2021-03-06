@props(['posts'])

<div class="grid grid-cols-1 gap-5 p-2 gap-y-8 sm:p-4 md:grid-cols-2 lg:grid-cols-3">
    @foreach($posts as $post)
        @php 
            // user visits category index /c/{category}
            // then get category only once
            if (isset($category)) {
                $post->category = $category;
            }
        @endphp
        <div class="relative pl-1 transition duration-500 transform cursor-pointer rounded-xl hover:scale-105">
            <!-- Tag Discount -->
            <a 
            @if(request()->is("c/". $post->category->slug)) 
            x-on:click.prevent 
            @endif 
            href="{{ route('category.index', ['category' => $category->slug ?? $post->category->slug]) }}"
                class="absolute top-0 left-0 z-30 px-2 mt-3 text-sm font-medium text-gray-100 capitalize transition duration-300 transform bg-blue-500 rounded-lg md:block small-caps hover:bg-red-600 hover:scale-125" >{{ __('home.nav.' . $post->category->title) }}</a>
            <div class="absolute top-0 left-0 h-2 px-2 mt-6 bg-blue-500 md:mt-5 md:h-3"></div>
            <div class="absolute top-0 left-0 z-0 h-2 pl-5 bg-blue-600 md:mt-6 mt-7 md:h-3 rounded-3xl"></div>
            <div class="pb-2 bg-gray-100 shadow-xl dark:bg-gray-700 rounded-xl">
                <div class="relative">
                    <a href="/p/{{ $post->slug }}" class="mx-auto text-center">
                        <img src='/rings.svg' data-src="{{ $post->img }}" class="lozad object-cover max-w-full rounded-t-xl min-h-[11rem] mx-auto" alt="" />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 px-2 mb-2 mr-2 text-xs font-medium text-gray-100 bg-yellow-500 rounded-lg">
                        <i class="fas fa-clock"></i>
                        <span>{{ $post->updated_diff }}</span>
                    </div>
                </div>
                <div class="px-2 py-1">
                    <!-- Product Title -->
                    <a href="/p/{{ $post->slug }}"
                        class="pr-2 text-sm font-bold text-center text-gray-800 capitalize md:text-base dark:text-white">{{ $post->title }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>