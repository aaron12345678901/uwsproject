{{-- @props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
$alignmentStyles = match ($align) {
    'left' => 'left: 0; transform: translateY(0);',
    'top' => 'transform: translateY(0);',
    default => 'right: 0; transform: translateY(0);',
};

$widthStyle = match ($width) {
    '48' => 'width: 12rem;', // width of 48 in Tailwind corresponds to 12rem
    default => "width: {$width};",
};
@endphp

<div style="position: relative;" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity: 0; transform: scale(0.95);"
         x-transition:enter-end="opacity: 1; transform: scale(1);"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity: 1; transform: scale(1);"
         x-transition:leave-end="opacity: 0; transform: scale(0.95);"
         style="position: absolute; z-index: 50; margin-top: 0.5rem; {{ $widthStyle }} border-radius: 0.375rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); {{ $alignmentStyles }}; display: none;" 
         @click="open = false">
        <div style="border-radius: 0.375rem; border: 1px solid rgba(0, 0, 0, 0.1); background: white; {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div> --}}