<nav>
    <!-- Primary Navigation Menu -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}">@csrf</form>

    <div class="container-fluid">
        <nav>
            <ul>
                {{ $slot }}
                <li>
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" role="button" class="secondary">
                        {{ __('News') }}
                    </x-nav-link>
                </li>
            </ul>
            <ul>
                @auth
                    <li>
                        <details role="list" dir="rtl">
                            <summary aria-haspopup="listbox" dir="rtl" role="link" class="secondary">
                                {{ Auth::user()->name }}
                            </summary>
                            <ul role="listbox">
                                <li>
                                    @if (Route::has('dashboard'))
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    @endif

                                </li>
                                <li>
                                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    @if (Route::has('logout'))
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                            out</a>
                                    @endif
                                </li>
                            </ul>
                        </details>
                    </li>
                @endauth
            </ul>
            <ul>

                @if (Route::has('about'))
                    <li><a href="{{ route('about') }}" class="secondary"><u>About</u></a></li>
                @endif
                @if (Route::has('contact.index'))
                    <li><a href="{{ route('contact.index') }}" class="secondary"><u>Contact</u></a></li>
                @endif
            </ul>
        </nav>
    </div>

</nav>
