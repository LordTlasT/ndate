<x-app-layout>
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <br>
        <button class="outline">{{ __('Resend Verification Email') }}</button>
    </form>
    @if (session('status') == 'verification-link-sent')
        <br><small>A new verification link has been sent to the email address you provided during registration. You can
            check out your <a href="{{ route('profile.edit') }}">profile</a> in case you forgot.</small>
    @endif


</x-app-layout>
