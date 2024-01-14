<x-modal-form action="{{ route('faq.store') }}" enctype="multipart/form-data" method="POST" :text="__('Create new FAQ Question')">
    @csrf
    <label for="question"><strong>{{ __('Question') }}</strong></label>
    <x-text-input id="question" type="text" name="question" :value="old('question')" required autofocus autocomplete="question"
        placeholder="Write the question here" />
    <x-input-error :messages="$errors->get('question')" />
    <label for="answer"><strong>{{ __('Answer') }}</strong></label>
    <textarea required name="answer" placeholder="{{ __('Write the answer here') }}">{{ old('answer') }}</textarea>
    <x-input-error :messages="$errors->get('answer')" />

    <label for="category_id"><strong>{{ __('Category') }}</strong></label>
    <select required name="category_id" id="category_id">
        <option value="" disabled>Select existing category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <a href="{{ route('category.index')}}">Create new category</a>
    <x-input-error :messages="$errors->get('category')" />
</x-modal-form>
