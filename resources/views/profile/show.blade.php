<x-guest-layout>
    <x-slot name="navigation">
        <li>
            <a href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
    </x-slot>

    <h1>{{$user->name}}</h1>
    @if ($user->avatar)
        <div style="
            width: 64px;
            height: 64px;
            background-image: url('{{ Storage::url($user->avatar) }}');
            background-size: cover;
            background-position: center;
        "></div>
    @endif
    <br>
    <p><strong>email:</strong><br><a href="maito:{{$user->email}}">{{ $user->email }}</a></p>
    <p><strong>Birthday:</strong><br>
    @if ($user->birthday)
        <span class="outline">{{ $user->birthday }}</span>
    @else
        <span><i>No birthday information.</i></span>
    @endif
    </p>
    <p><strong>Biography:</strong><br>
    @if ($user->biography)
        <span>{{ $user->biography }}</span>
    @else
        <span><i>No biography yet.</i></span>
    @endif
    </p>

</x-guest-layout>
