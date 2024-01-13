<x-guest-layout>

    <x-slot name="navigation">
        <li><a href="/">Home</a></li>
    </x-slot>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
            autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" />

        <!-- Email Address -->
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

        <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
        <x-primary-button>{{ __('Register') }}</x-primary-button>

    </form>
</x-guest-layout>
