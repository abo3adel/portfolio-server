<div class="focus:outline-none">
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 md:gap-8" x-data="{
        posts: {{ $featured->toJson() }},
        active: {
            id: 0,
            title: '',
            slug: '',
            body_mini: '',
            img: '',
        }}">
        <div class="relative pl-1 rounded-xl" x-init="active = !active.id ? posts[0] : active">
            <!-- Tag Discount -->
            <a :href="`/c/${active.category.slug}`"
                class="absolute top-0 left-0 z-30 px-2 mt-3 text-sm font-medium text-gray-100 capitalize transition duration-300 transform bg-blue-500 rounded-lg md:block small-caps hover:bg-red-600 hover:scale-125"
                x-text="active.category.title"></a>
            <div class="absolute top-0 left-0 h-2 px-2 mt-6 bg-blue-500 md:mt-5 md:h-3"></div>
            <div class="absolute top-0 left-0 z-0 h-2 pl-5 bg-blue-600 md:mt-6 mt-7 md:h-3 rounded-3xl"></div>
            <div class="pb-2 bg-gray-100 shadow-xl dark:bg-gray-700 rounded-xl">
                <div class="relative">
                    <a :href="'/p/' + active.slug">
                        <img :src="active.img" class="object-cover max-w-full rounded-t-xl min-h-64" alt="post image" />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 px-2 mb-2 mr-2 text-xs font-medium text-gray-100 bg-yellow-500 rounded-lg">
                        <i class="fas fa-clock"></i>
                        <span x-text="active.updated_diff"></span>
                    </div>
                </div>
                <div class="px-2 py-1">
                    <!-- Product Title -->
                    <a :href="'/p/' + active.slug"
                        class="pr-2 text-sm font-bold text-center text-gray-800 capitalize md:text-base dark:text-white"
                        x-text="active.title"></a>

                    <p class="my-4 text-gray-500 dark:text-gray-400" x-text="active.body_mini"></p>

                    <div class="py-5 my-3">
                        <a :href="'/p'+ active.slug" class="btn">
                            {{ __('home.read_more') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- posts list --}}

        <div class="my-7 sm:my-0">
            <template x-for="post in posts" x-key="post.id">
                <template x-if="post.id !== active.id">
                    <div class="relative pl-1 transition duration-500 transform cursor-pointer rounded-xl hover:scale-105 group mb-7"
                        x-on:click="active = post">
                        <!-- Tag Discount -->
                        <a href='#' x-on:click.prevent
                            class="absolute top-0 left-0 z-30 block px-2 mt-3 text-sm font-medium text-gray-100 capitalize bg-blue-500 rounded-lg md:block small-caps sm:hidden"
                            x-text="post.category.title"></a>
                        <div class="absolute top-0 left-0 h-2 px-2 mt-6 bg-blue-500 md:mt-5 md:h-3 sm:hidden md:block">
                        </div>
                        <div
                            class="absolute top-0 left-0 z-0 h-2 pl-5 bg-blue-600 md:mt-6 mt-7 md:h-3 rounded-3xl sm:hidden md:block">
                        </div>
                        <div
                            class="text-gray-800 bg-gray-100 shadow-xl dark:bg-gray-600 rounded-xl group-hover:bg-blue-700 group-hover:text-white">
                            <div class="flex flex-col sm:flex-row">
                                <div>
                                    <a :href="'/p/' + post.slug">
                                        <img :src="post.img" class="block object-cover max-w-full rounded-t-xl md:rounded-t-none md:rounded-l-xl sm:h-32 sm:hidden md:block"
                                            alt="post image" />
                                    </a>
                                </div>
                                <div class="px-1 py-1">
                                    <p class="invisible text-sm text-gray-500 uppercase dark:text-gray-400 sm:visible md:invisible"
                                        x-text="post.category.title"></p>
                                    <!-- Product Title -->
                                    <p class="text-sm font-bold text-center capitalize md:text-base dark:text-white"
                                        x-text="post.title"></p>

                                    <p class="block my-4 text-gray-500 dark:text-gray-400 sm:hidden"
                                        x-text="active.body_mini"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </template>
        </div>
    </div>


</div>
