@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['style' => 'font-weight: 500; font-size: 0.875rem; color: #4CAF50;']) }}>
        {{ $status }}
    </div>
@endif