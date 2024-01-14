<x-app-layout>
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <br>
        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Resend Verification Email') }}</a>
    </form>
    @if (session('status') == 'verification-link-sent')
        <small>A new verification link has been sent to the email address you provided during registration. You can
            check out your email address at your <a href="{{ route('profile.edit') }}">profile</a>.</small>
    @endif


</x-app-layout>
