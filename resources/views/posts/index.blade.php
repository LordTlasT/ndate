<x-app-layout>

    <x-post action="{{ route('posts.store') }}">
    </x-post>

    <hr>
    @foreach ($posts as $post)
        @if ($post->user->is(auth()->user()))
            <form id="form-{{ $post->id }}" method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('delete')
        @endif
        </form>

        <span>
            <strong>{{ $post->user->name }}</strong>
            <small>{{ $post->created_at->format('j M Y, g:i a') }}</small>
            @unless ($post->created_at->eq($post->updated_at))
                <small> &middot; {{ __('edited') }}</small>
            @endunless
        </span>
        <blockquote>{{ $post->message }}</blockquote>
        @if ($post->user->is(auth()->user()))
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('form-{{ $post->id }}').submit();">
                {{ __('Delete') }}</a>
            <a href="{{ route('posts.edit', $post) }}"> {{ __('Edit') }}</a>
        @endif
    @endforeach

</x-app-layout>
