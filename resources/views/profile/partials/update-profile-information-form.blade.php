<section>
    <hgroup>
        <h2>{{ __('Profile Information') }}</h2>
        <p>{{ __("Update your account's profile information and email address.") }}</p>
    </hgroup>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus
            autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" />

        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" />

        <x-input-label for="birthday" :value="__('Birthday')" />
        <x-text-input id="birthday" name="birthday" type="date" :value="old('birthday', $user->birthday)" />

        <x-input-label for="avatar" :value="__('Avatar')" />
        <input id="avatar" name="avatar" type="file" accept="image/*" />

        <x-input-label for="biography" :value="__('Biography')" />
        <textarea-input id="biography" name="biography" :value="old('biography', $user->biography)"></textarea>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <p>{{ __('Your email address is unverified.') }}
                <button class="outline" form="send-verification"> {{ __('re-send the verification email.') }} </button>
            </p>

            @if (session('status') === 'verification-link-sent')
                <p> {{ __('A new verification link has been sent to your email address.') }} </p>
            @endif

        @endif

        <x-primary-button>{{ __('Update Profile') }}</x-primary-button>

    </form>
</section>
