@props(['active'])

@php
$classes = ($active ?? false)
            ? 'display: inline-flex; align-items: center; padding: 0.25rem 0.5rem; border-bottom: 2px solid #4f46e5; font-size: 0.875rem; font-weight: 500; color: #111827; text-decoration: none; transition: all 0.15s ease-in-out;'
            : 'display: inline-flex; align-items: center; padding: 0.25rem 0.5rem; border-bottom: 2px solid transparent; font-size: 0.875rem; font-weight: 500; color: #6b7280; text-decoration: none; transition: all 0.15s ease-in-out;';

$hoverClasses = 'color: #374151; border-color: #d1d5db;'; // Styles for hover and focus states
@endphp

<a {{ $attributes->merge(['style' => $classes]) }}
   onmouseover="this.style.color='{{ substr($hoverClasses, 6, 7) }}'; this.style.borderColor='{{ substr($hoverClasses, 18, 7) }}';"
   onmouseout="this.style.color='{{ ($active ?? false) ? '#111827' : '#6b7280' }}'; this.style.borderColor='transparent';"
   onfocus="this.style.color='{{ substr($hoverClasses, 6, 7) }}'; this.style.borderColor='{{ substr($hoverClasses, 18, 7) }}';"
   onblur="this.style.color='{{ ($active ?? false) ? '#111827' : '#6b7280' }}'; this.style.borderColor='transparent';">
    {{ $slot }}
</a>