<x-guest-layout>

    <x-slot name="navigation">
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard') }}"><strong>Dashboard</strong></a></li>
                <form id="form" method="POST" action="{{ route('logout') }}">@csrf</form>
                @if (Route::has('logout'))
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('form').submit();">Log
                            out</a></li>
                @endif
            @else
                <li><a href="{{ route('login') }}"><strong>Log in</strong></a></li>

                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif @endauth
            @endif
        </x-slot>

        <x-slot name="header">
        <hgroup>
            <h1 align="center">endate</h1>
            <p align="center"><small><i>Choosing... but it's easy!</i></small></p>
        </hgroup>
        </x-slot>

        <hgroup>
            <h4>Who is this for?</h4>
            <p>everyone.</p>
        </hgroup>

        <hgroup>
            <h4>What is endate?</h4>
            <p>endate is an app that helps you choose between n options. It's that simple.</p>
        </hgroup>

        <footer>
            <small>
                Built with <a href="https://laravel.com" class="secondary">Laravel</a> and <a href="https://picocss.com"
                    class="secondary">Pico</a>
            </small>
        </footer>

    </x-guest-layout>
