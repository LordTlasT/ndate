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
    <x-slot name="header">
        <hgroup>
            <h2 align="center">
                {{ __('FAQ') }}
            </h2>
            <p align="center">Frequently Asked Questions</p>
        </hgroup>
    </x-slot>
    <x-session />
    @if (is_admin($cur_user))
        @include('faq.create-faq', ['categories' => $categories])
    @endif

    @foreach ($faqs as $faq)
        <hgroup>
            <h3>{{ $faq->question }}</h3>
        <p><mark>{{ $faq->category->name }}</mark></p>
            <blockquote>{{ $faq->answer }}</blockquote>
        </hgroup>
        @if (is_admin($cur_user))
            <form id="faq-{{ $faq->id }}" method="POST" action="{{ route('faq.destroy', $faq) }}">
                @csrf
                @method('delete')
            </form>
            <a href="{{ route('faq.edit', $faq) }}">{{ __('Edit') }}</a>
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('faq-{{ $faq->id }}').submit();">{{ __('Delete') }}</a>
        @endif
    @endforeach
</x-guest-layout>
