<nav>
    <!-- Primary Navigation Menu -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}">@csrf</form>

    <div class="container-fluid">
        <nav>
            <ul>
                <li><a href="/">Home</a>
                </li>
                <li>
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Posts') }}
                    </x-nav-link>
                </li>

            </ul>
            <ul>
                <li role="list">
                    <details role="list" dir="rtl">
                        <summary aria-haspopup="listbox" dir="rtl" role="link">
                            {{ Auth::user()->name }}
                        </summary>
                        <ul role="listbox">
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
            </ul>
        </nav>
    </div>

</nav>
