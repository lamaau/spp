@props(['x-close'])
<div {{ $attributes }} x-on:keydown.window.escape="{{ $xClose }}"
    class="absolute top-0 left-0 z-50 flex items-center justify-center w-full h-full p-10"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform opacity-0"
    x-transition:enter-end="transform opacity-100" x-transition:leave="transition ease-in duration-400"
    x-transition:leave-start="transform opacity-100" x-transition:leave-end="transform opacity-0"
    style="display: none;">
    <div class="absolute w-full h-full bg-gray-900 opacity-50 modal-overlay">
    </div>
    <div class="z-50 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container">
        <div x-on:click="{{ $xClose }}"
            class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer modal-close">
            <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
            </svg>
            <span class="text-2xl">(Esc)</span>
        </div>
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="p-5 modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
