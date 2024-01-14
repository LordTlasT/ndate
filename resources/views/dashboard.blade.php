<x-app-layout>
    <x-slot name="navigation">
        <li>
            <a href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
    </x-slot>

    <x-slot name="header">
        <h2 align="center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{ __("You're logged in!") }}
    <footer>
        @if (auth()->user()->is_admin)
        <section>
            <hgroup>
                <h4>User Promotion</h4>
                <p>Promote a regular user to an administrator.</p>
            </hgroup>
            <form method="POST" action="{{ route('profile.promote') }}">
                @csrf
                @method('PUT')
                <x-input-label for="email" value="{{ __('Email') }}" />
                <x-text-input id="email" name="email" type="email" placeholder="{{ __('Email') }}" required />
                @if (session('status'))
                    <small>{{ session('status') }}</small>
                @endif
                <button>Promote user</button>
            </form>
        </section>
        @endif

    </footer>
</x-app-layout>
