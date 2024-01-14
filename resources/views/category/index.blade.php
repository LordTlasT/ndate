<x-app-layout>

    <x-session />
    <x-modal-form action="{{ route('category.store') }}" method="POST" :text="__('Create new category')">
        @csrf
        <label for="category"><strong>{{ __('Category') }}</strong></label>
        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
            placeholder="Write the category here" />
        <x-input-error :messages="$errors->get('category')" />
    </x-modal-form>

    @foreach ($categories as $category)
        <form method="POST" action="{{ route('category.destroy', $category) }}">
            @csrf
            @method('delete')
            <strong>{{ $category->name }}</strong>
            <a href="{{ route('category.edit', $category) }}">{{ __('Edit') }}</a>
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit()">{{ __('Delete') }}</a>
        </form>
    @endforeach

</x-app-layout>
