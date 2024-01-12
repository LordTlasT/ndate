<x-guest-layout>
    <x-slot name="navigation">
        <li><a href="/">Home</a></li>
    </x-slot>
    <x-slot name="header">
        <hgroup>
            <h2 align="center">
                {{ __('Reset Password') }}
            </h2>
        <p align="center"><strong>{{ $request->email }}</strong></p>
        </hgroup>
    </x-slot>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <x-input-error :messages="$errors->get('email')" />

        <!-- Password -->
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" />

        <!-- Confirm Password -->
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" />

        <x-primary-button>
            {{ __('Reset Password') }}
        </x-primary-button>

    </form>
</x-guest-layout>
