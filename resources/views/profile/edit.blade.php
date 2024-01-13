<x-app-layout>
    <x-slot name="header">
        <hgroup>
            <h2 align="center">
                {{ __('Profile') }}
            </h2>
            <p align="center"><a href="{{route('profile.show', $user)}}">Link to yours.</a></p>
        </hgroup>
    </x-slot>
    <div class="grid">

        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
</x-app-layout>
