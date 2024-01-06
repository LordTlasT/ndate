<x-app-layout>
    <x-slot name="header">
        <h2 align="center">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="grid">

        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
</x-app-layout>
