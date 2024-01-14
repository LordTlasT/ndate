<x-app-layout>
    <x-slot name="header">
        <hgroup>
            <h3 align="center">{{ __('Edit') }}</h3>
            <p align="center"><a href="{{ route('faq.index') }}">{{ __('Cancel') }}</a></p>
        </hgroup>
    </x-slot>
    <form method="POST" action="{{ route('faq.update', $faq) }}">
        @csrf
        @method('patch')

        <label for="question"><strong>{{ __('Question') }}</strong>
            <x-text-input id="question" type="text" name="question" :value="old('question', $faq->question)" required autofocus
                autocomplete="question" placeholder="Write the question here" />
        </label>
        <x-input-error :messages="$errors->get('question')" />

        <label for="answer"><strong>{{ __('Answer') }}</strong>
            <textarea name="answer" placeholder="{{ __('Write the answer here') }}">{{ old('answer', $faq->answer) }}</textarea>
            <x-input-error :messages="$errors->get('answer')" />
        </label>

        <label for="category"><strong>{{ __('Category') }}</strong></label>
        <select required name="category_id" id="category">
            <option value="" disabled>Select existing category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category == $faq->category) selected @endif>
                    {{ $category->name }}</option>
            @endforeach
        </select>

        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>

</x-app-layout>
