<button {{ $attributes->merge(['type' => 'submit', 'style' => 'display: inline-flex; align-items: center; padding: 0.5rem 1rem; background-color: #e3342f; border: 1px solid transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; color: white; text-transform: uppercase; letter-spacing: 0.05em; transition: background-color 0.15s ease-in-out, transform 0.15s ease-in-out;']) }}
    onmouseover="this.style.backgroundColor='#cc1f24';" 
    onmouseout="this.style.backgroundColor='#e3342f';"
    onmousedown="this.style.backgroundColor='#b02e31';" 
    onmouseup="this.style.backgroundColor='#cc1f24';"
    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px rgba(255, 0, 0, 0.5)';" 
    onblur="this.style.boxShadow='none';">
    {{ $slot }}
</button>