<x-guest-layout>
    <div class="p-2">
        <div class="bg-white dark:bg-gray-700 dark:text-white p-6 md:mx-auto rounded-2xl">
            <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                </path>
            </svg>
            <div class="text-center">
                <h3 class="text-2xl text-gray-900 dark:text-white font-semibold text-center">
                    {{ __('home.sub.verify.done') }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 my-2">
                    {{ __('home.sub.verify.thank') }}
                </p>
                <p> {{ __('home.sub.verify.great') }}
                </p>
                <div class="py-10 text-center">
                    <a href="/" class="px-12 bg-indigo-600 text-white font-semibold py-3 relative group h-14
                    before:absolute 
                    before:inset-0 
                    before:bg-indigo-700 
                    before:scale-x-0 
                    before:origin-right
                    before:transition
                    before:duration-300
                    hover:before:scale-x-100
                    hover:before:origin-left">
                        <span class="relative uppercase text-base text-white">
                            Home
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
