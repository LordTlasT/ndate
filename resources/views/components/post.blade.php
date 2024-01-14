<form enctype="multipart/form-data" method="POST">
    @csrf
    {{ $slot }}
    <textarea required name="message" placeholder="{{ __('What\'s on your mind?') }}">{{ old('message') }}</textarea>
    <x-input-error :messages="$errors->get('message')" />
    <x-primary-button>{{ __('Post') }}</x-primary-button>
</form>
