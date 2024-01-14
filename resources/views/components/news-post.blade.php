<x-post>
    <input required type="text" name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
    <x-input-error :messages="$errors->get('title')" />
    <x-input-label for="cover_image" :value="__('Cover Image')" />
    <input id="cover_image" type="file" name="cover_image">
    <x-input-error :messages="$errors->get('cover_image')" />
</x-post>
