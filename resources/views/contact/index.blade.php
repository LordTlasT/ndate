<x-guest-layout>
    <x-slot name="navigation">
        <li><a href="/">Home</a></li>
    </x-slot>
    <x-slot name="header">
        <hgroup>
            <h2 align="center">
                {{ __('Contact') }}
            </h2>
            <p align="center">{{ __('Send us your remarks on what we could improve.') }}</p>
        </hgroup>
    </x-slot>
    <x-post action="{{ route('contact.store') }}">
    </x-post>
</x-guest-layout>
