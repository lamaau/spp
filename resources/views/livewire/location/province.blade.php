<div class="px-3 mb-6 md:w-1/2 md:mb-0">
    <div x-data="{ open: false }">
        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
            Provinsi
        </label>
        <div class="relative">
            <input type="text" @click="open = !open"
                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" />

            <svg class="absolute w-4 h-4 inset-y-5 right-3 feather feather-chevron-up" fill="none" stroke="currentColor"
                x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
            <svg class="absolute w-4 h-4 inset-y-5 right-3 feather feather-chevron-down" fill="none" height="24"
                x-show="!open" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
        <div @click.away="open = false"
            class="absolute overflow-auto bg-white border-b appearance-none my-select md:w-72 max-h-60 border-grey">
            <template x-if="open">
                <ul class="flex flex-col list-reset">
                    <li>hello</li>
                    <li>hello</li>
                    <li>hello</li>
                </ul>
            </template>
        </div>
    </div>
</div>
