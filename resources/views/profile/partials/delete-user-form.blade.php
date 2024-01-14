<section>
    <hgroup>
        <h2> {{ __('Delete Account') }} </h2>
        <p> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
        <x-input-error :messages="$errors->userDeletion->get('password')" />
    </hgroup>

    <x-modal-form :text="__('Delete Account')" method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')
        <hgroup>
            <h2> {{ __('Are you sure?') }} </h2>
            <p> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
        </hgroup>

        <x-input-label for="password" required value="{{ __('Password') }}" />
        <x-text-input id="password" name="password" type="password" placeholder="{{ __('Password') }}" required />
        <x-input-error :messages="$errors->userDeletion->get('password')" />
    </x-modal-form>
</section>
