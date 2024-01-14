<form enctype="multipart/form-data" method="POST">
    @csrf
    <input required type="text" name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
    <x-input-error :messages="$errors->get('title')" />
    <textarea required name="message" placeholder="{{ __('What\'s on your mind?') }}">{{ old('message') }}</textarea>
    <x-input-error :messages="$errors->get('message')" />
    <input type="file" name="cover_image">
    <x-input-error :messages="$errors->get('cover_image')" />

    <x-primary-button>{{ __('Post') }}</x-primary-button>
</form>
