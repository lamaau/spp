<button type="button"
    class="p-2 text-white bg-yellow-500 rounded focus:outline-none focus:ring-2 focus:ring-yellow-300">
    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path id="Stroke 1" d="M13.3352 19.5078H19.7122" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
        <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
            d="M16.0578 4.85901V4.85901C14.7138 3.85101 12.8078 4.12301 11.7998 5.46601C11.7998 5.46601 6.78679 12.144 5.04779 14.461C3.30879 16.779 4.95379 19.651 4.95379 19.651C4.95379 19.651 8.19779 20.397 9.91179 18.112C11.6268 15.828 16.6638 9.11701 16.6638 9.11701C17.6718 7.77401 17.4008 5.86701 16.0578 4.85901Z"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path id="Stroke 5" d="M10.5042 7.21143L15.3682 10.8624" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</button>
<button type="button" wire:click="destroy('{{ $model->id }}')"
    class="p-2 text-white bg-red-500 rounded focus:outline-none focus:ring-2 focus:ring-red-300">
    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-trash-2">
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
        </path>
        <line x1="10" y1="11" x2="10" y2="17"></line>
        <line x1="14" y1="11" x2="14" y2="17"></line>
    </svg>
</button>
