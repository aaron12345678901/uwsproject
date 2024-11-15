@props(['value'])

<label {{ $attributes->merge(['style' => 'display: block; font-weight: 500; font-size: 0.875rem; color: #4a5568;']) }}>
    {{ $value ?? $slot }}
</label>