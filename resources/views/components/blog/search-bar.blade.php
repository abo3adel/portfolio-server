<x-common.card :title="__('blog.side.search.title')">
    <form class="form p-2" x-data="{q: '', busy: false}" action="{{ route('search') }}" method="GET" x-on:submit="busy = true">
        <x-common.form-input :ph="__('blog.side.search.ph')" name='q' :error-message="$errors->first('q')" />
        <x-button x-bind:disabled="q.length < 2" x-on:click="busy = true" icon='save' type='submit'>
            {{ __('blog.side.search.btn') }}
        </x-button>
    </form>
</x-common.card>
