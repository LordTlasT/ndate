<x-app-layout>
    <x-slot name="header">
        <h5 align="center">
            {{ __('Edit') }}
        </h5>
    </x-slot>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('patch')
        <a href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
        <textarea name="message">{{ old('message', $post->message) }}</textarea>
        <x-input-error :messages="$errors->get('message')" />

        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>

</x-app-layout>
