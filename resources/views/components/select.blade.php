<label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
    {{ $label }}
</label>

<div class="relative">
    {{ $input }}

    <svg class="absolute w-4 h-4 inset-y-5 right-3 feather feather-chevron-up" fill="none" stroke="currentColor"
        x-show="visible && !search" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
    <svg class="absolute w-4 h-4 inset-y-5 right-3 feather feather-chevron-down" fill="none" height="24"
        x-show="!visible && !search" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <polyline points="6 9 12 15 18 9"></polyline>
    </svg>
    <svg @click="search = ''" class="absolute w-4 h-4 cursor-pointer inset-y-5 right-3 feather feather-x" fill="none"
        x-show="search" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <line x1="18" x2="6" y1="6" y2="18"></line>
        <line x1="6" x2="18" y1="6" y2="18"></line>
    </svg>
</div>

{{ $container }}
