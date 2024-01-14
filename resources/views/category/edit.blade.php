<x-app-layout>
    <x-slot name="header">
        <h5 align="center">
            {{ __('Edit') }}
        </h5>
    </x-slot>
    <form method="POST" action="{{ route('category.update', $category) }}">
        @csrf
        @method('patch')
        <a href="{{ route('category.index') }}">{{ __('Cancel') }}</a>
        <input type="text" name="name" value="{{ old('name', $category->name)}}">
        <x-input-error :messages="$errors->get('message')" />

        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>
</x-app-layout>