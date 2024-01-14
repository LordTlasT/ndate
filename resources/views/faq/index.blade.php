<x-guest-layout>
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



    @foreach ($faqs as $faq)
        <form id="faq-{{ $faq->id }}" method="POST" action="{{ route('faq.destroy', $faq) }}">
            @csrf
            @method('delete')
        </form>
        <h3>{{ $faq->title }}</h3>
        <span>by
            <strong>{{ $faq->user->name }}</strong> on
            <small>{{ $faq->created_at->format('j M Y, g:i a') }}</small>
            @unless ($faq->created_at->eq($faq->updated_at))
                <small> &middot; {{ __('edited') }}</small>
            @endunless
        </span>
        <blockquote>{{ $faq->message }}</blockquote>
        @if (is_admin($cur_user))
            <a href="{{ route('faqs.edit', $faq) }}">{{ __('Edit') }}</a>
            <button type="submit" form="faq-{{ $faq->id }}">{{ __('Delete') }}</button>
        @endif
        <hr>

        @if (is_admin($cur_user))
            <form id="form-{{ $faq->id }}" method="POST" action="{{ route('faqs.destroy', $faq) }}">
                @csrf
                @method('delete')
            </form>
        @endif
    @endforeach
</x-guest-layout>
