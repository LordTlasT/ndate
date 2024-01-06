<x-app-layout>
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" />

        <x-primary-button>{{ __('Confirm') }}</x-primary-button>
    </form>
</x-app-layout>
