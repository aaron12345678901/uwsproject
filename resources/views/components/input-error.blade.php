@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['style' => 'font-size: 0.875rem; color: #e3342f; margin: 0; padding: 0; list-style-type: none;']) }}>
        @foreach ((array) $messages as $message)
            <li style="margin-bottom: 0.25rem;">{{ $message }}</li>
        @endforeach
    </ul>
@endif