<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <x-slot name="navigation">
        <li><a href="/">Home</a></li>
    </x-slot name>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        {{-- email --}}
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
            autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" />

        {{-- password --}}
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" />

        <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            <span>{{ __('Remember me') }}</span>
        </label>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        @endif
        <input type="submit" value="{{ __('Log in') }}">
    </form>


</x-guest-layout>
