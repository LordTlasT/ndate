@php
    $cur_user = auth()->user();
    /**
     * Returns true if the current user is an admin.
     * @return bool
     */
    function is_admin($user)
    {
        return $user && $user->isAdmin();
    }
@endphp

<x-guest-layout>

    <x-slot name="navigation">
        <li>
            <a href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
    </x-slot>

    <x-slot name="header">
        <hgroup>
            <h2 align="center">
                {{ __('News') }}
            </h2>
            <p align="center">Latest news!</p>
        </hgroup>
    </x-slot>

    @if (is_admin($cur_user))
        <x-post action="{{ route('posts.store') }}">
        </x-post>
        <hr>
    @endif

    @foreach ($posts as $post)
        @if (is_admin($cur_user))
            <form id="form-{{ $post->id }}" method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('delete')
        @endif
        </form>

        <h3>{{ $post->title }}</h3>
        @if ($post->cover_image)
            <div
                style="
            width: 256px;
            height: 128px;
            background-image: url('{{ Storage::url($post->cover_image) }}');
            background-size: cover;
            background-position: center;
        "></div>
        @endif
        <span>by
            <strong>{{ $post->user->name }}</strong> on
            <small>{{ $post->created_at->format('j M Y, g:i a') }}</small>
            @unless ($post->created_at->eq($post->updated_at))
                <small> &middot; {{ __('edited') }}</small>
            @endunless
        </span>
        <blockquote>{{ $post->message }}</blockquote>
        @if (is_admin($cur_user))
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('form-{{ $post->id }}').submit();">
                {{ __('Delete') }}</a>
            <a href="{{ route('posts.edit', $post) }}"> {{ __('Edit') }}</a>
        @endif
    @endforeach

</x-guest-layout>
