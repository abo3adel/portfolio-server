<!-- subscribe -->
<div class="rounded flex md:shadow my-12">
    <img src="gmail-svgrepo-com.svg" class="w-0 md:w-1/4 object-cover rounded-l" />
    <div class="px-4 py-2 pt-10">
        <h3 class="text-3xl text-gray-800 dark:text-gray-100 font-bold">
            {{ __('home.sub.title') }}
            <x-header-line />
        </h3>
        <p class="text-xl text-gray-700 dark:text-gray-500">
            {{ __('home.sub.sentence') }}
        </p>
        <div x-data='{
            email: "",
            sending: false,
            error: false,
            done: false,
            testMail() {
                var re = /\S+@\S+\.\S+/;
                return re.test(this.email);
            },
            async subscribe() {
                this.sending = true;
                this.done = false;
                this.error = false;

                const res = await axios.post("/subscribe", {email: this.email});

                if (!res || !res.data || !res.data.done) {
                    this.sending = false;
                    this.error = true;
                    this.hideAlert();
                    return;
                }

                this.done = true;
                this.email = "";
                this.sending = false;
                this.hideAlert();
            },
            hideAlert() {
                setTimeout(() => {
                    this.done = false;
                    this.error = false;
                }, 5000);
            }
        }'>
            <template x-if="done || error">
                <div class="p-2">
                    <div class="inline-flex items-center bg-white dark:bg-gray-700 leading-none rounded-full p-2 shadow text-teal text-sm"
                        :class="done ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'">
                        <span
                            class="inline-flex  text-white rounded-full h-6 px-3 justify-center items-center uppercase"
                            :class="done ? 'bg-green-600 dark:bg-green-500' : 'bg-red-600 dark:bg-red-500'">
                            {{ __('home.sub.heads') }}
                        </span>
                        <span class="inline-flex px-2 capitalize">
                            <template x-if="done">
                                <span>{{ __('home.sub.confirm') }}</span>
                            </template>
                            <template x-if="error">
                                <span>{{ __('home.sub.error') }}</span>
                            </template>
                        </span>
                    </div>
                </div>
            </template>
            <form class="mt-4 mb-10" method="POST">
                <input type="email" class="rounded bg-gray-100 dark:text-gray-800 px-4 py-2 border focus:border-green-400"
                    placeholder="mahmoud@tech.com" name="email" x-model.trim="email"
                    :class="!testMail() ? 'focus:border-red-500' : ''" />

                <button class="px-4 py-2 rounded btn" x-on:click.prevent="subscribe()" :disabled="!testMail()">
                    <i class="fas fa-envelope mx-1" :class="sending ? 'fa-spin fa-spinner' : ''"></i>
                    {{ __('home.sub.btn') }}
                </button>
                <p class="text-green-700 dark:text-green-500 opacity-50 text-sm mt-1">
                    {{ __('home.sub.spam') }}
                </p>
            </form>
        </div>
    </div>
</div>
<!-- ens subscribe section -->
