<section>
    <hgroup>
        <h2> {{ __('Delete Account') }} </h2>
        <p> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
        <x-input-error :messages="$errors->userDeletion->get('password')" />
    </hgroup>

    <button class="secondary" data-target="modal-example" onClick="document.getElementById('modal-example').showModal()">
        {{ __('Delete Account') }}</button>

    <dialog id="modal-example">
        <article>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <hgroup>
                    <h2> {{ __('Are you sure?') }} </h2>
                    <p> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                </hgroup>

                <x-input-label for="password" required value="{{ __('Password') }}" />
                <x-text-input id="password" name="password" type="password" placeholder="{{ __('Password') }}"
                    required />
                <x-input-error :messages="$errors->userDeletion->get('password')" />

                    <input type="submit" class="secondary" value="{{ __('Delete Account') }}">
                <button class="outline"
                    onclick="event.preventDefault(); document.getElementById('modal-example').close()">{{ __('Cancel') }}</button>

            </form>
        </article>
    </dialog>
</section>
