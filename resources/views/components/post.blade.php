<form method="POST" >
    @csrf
    <textarea name="message" placeholder="{{ __('What\'s on your mind?') }}">{{ old('message') }}</textarea>
    <x-input-error :messages="$errors->get('message')" />
    <x-primary-button>{{ __('Post') }}</x-primary-button>
</form>
