@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'max-width: 20rem;',  // Corresponds to sm:max-w-sm
    'md' => 'max-width: 28rem;',  // Corresponds to sm:max-w-md
    'lg' => 'max-width: 32rem;',  // Corresponds to sm:max-w-lg
    'xl' => 'max-width: 36rem;',  // Corresponds to sm:max-w-xl
    '2xl' => 'max-width: 42rem;', // Corresponds to sm:max-w-2xl
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div style="position: absolute; inset: 0; background-color: rgba(75, 85, 99, 0.75);"></div>
    </div>

    <div
        x-show="show"
        style="margin-bottom: 1.5rem; background-color: white; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); transform: translateY(0); transition: all 0.3s ease-out;"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0; transform: translateY(1rem) scale(0.95);"
        x-transition:enter-end="opacity-100; transform: translateY(0) scale(1);"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100; transform: translateY(0) scale(1);"
        x-transition:leave-end="opacity-0; transform: translateY(1rem) scale(0.95);"
        class="mb-6 sm:w-full {{ $maxWidth }} sm:mx-auto"
    >
        {{ $slot }}
    </div>
</div>