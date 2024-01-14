@php
    $modalId = $modalId ?? 'modal';
@endphp
<button class="secondary" data-target="modal" onClick="document.getElementById('modal').showModal()">
    {{ $text }}</button>

<dialog id="{{ $modalId }}">
    <article>
        <form {{ $attributes->merge() }}>
            {{ $slot }}

            <input type="submit" class="secondary" value="{{ $text }}">
            <button class="outline"
                onclick="event.preventDefault(); document.getElementById('{{ $modalId }}').close()">{{ __('Cancel') }}
            </button>
        </form>
    </article>
</dialog>
