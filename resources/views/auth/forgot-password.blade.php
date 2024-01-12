<x-guest-layout>
    <x-slot name="navigation">
        <li><a href="/">Home</a></li>
    </x-slot>

    <x-slot name="header">
        <hgroup>
            <h2 align="center">
                {{ __('Forgot Password') }}
            </h2>
            <p align="center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </hgroup>
    </x-slot>


    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email Address -->
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="example@email.com"
            required autofocus />
        <x-input-error :messages="$errors->get('email')" />
        <!-- Session Status -->
        <small><x-auth-session-status :status="session('status')" /></small>

        <x-primary-button>
            {{ __('Password Reset Link') }}
        </x-primary-button>

    </form>
</x-guest-layout>
