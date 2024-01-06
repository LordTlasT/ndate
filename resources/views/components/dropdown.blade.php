@props(['summary'])

<details role="list">
    <summary aria-haspopup="listbox" role="button" {{ $attributes->merge() }}>
        {{ $summary }}
    </summary>
    <ul role="listbox">
        {{ $slot }}
    </ul>
</details>
