<div {{ $attributes }}>
    <div class="flex flex-col items-center justify-between mt-3 sm:flex-row">
        <div class="flex items-center justify-start">
            <div class="relative">
                <select x-model="perPage"
                    class="block px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded appearance-none focus:border-l focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
            @if ($actions ?? false)
                {{ $actions }}
            @endif
        </div>
        <div class="relative block mt-2 sm:mt-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                    <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                    </path>
                </svg>
            </span>
            <input x-model.debounce.500="search" placeholder="Cari disini..."
                class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded appearance-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
        </div>
    </div>
    <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
        <div class="relative inline-block min-w-full overflow-hidden rounded-lg shadow">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <template x-for="(column, index) in columns" x-key="index">
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <template x-if="!column.visibility || column.visibility === 'visible'">
                                    <div class="flex flex-wrap justify-left">
                                        <span x-text="column.text"></span>
                                        <template x-if="column.sortable || column.sortable === true">
                                            <div class="ml-2 -mt-1">
                                                <svg x-on:click="sort(column.key, 'asc')" fill="none" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                    class="w-3 h-3 text-gray-500 cursor-pointer fill-current"
                                                    x-bind:class="{'text-gray-900': sorted.key === column.key && sorted.rule === 'asc'}">
                                                    <path d="M5 15l7-7 7 7"></path>
                                                </svg>
                                                <svg x-on:click="sort(column.key, 'desc')" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                    class="w-3 h-3 text-gray-500 cursor-pointer fill-current"
                                                    x-bind:class="{'text-gray-900': sorted.key === column.key && sorted.rule === 'desc'}">
                                                    <path d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </template>
                                    </div>
                                </template>
                            </th>
                        </template>
                    </tr>
                </thead>
                <tbody class="relative" x-bind:class="{'bg-gray-300 opacity-50' : loading, 'bg-white' : !(loading)}">
                    <div x-show="loading" class="absolute z-50 p-4 text-white bg-gray-600 rounded-md"
                        style="display: none; top: 50%; left: 50%;transform: translate(-50%, -50%);">
                        Loading...</div>
                    <template x-if="items.length" x-for="(item, index) in items">
                        <tr>
                            <template x-for="(column, i) in columns" x-key="i">
                                <td class="px-5 py-5 text-sm border-b border-gray-300">
                                    <template
                                        x-if="column.key !== 'action' && !column.visibility || column.visibility !== 'hidden'">
                                        <span x-text="item[column.key]"></span>
                                    </template>
                                    <template x-if="column.key && column.key === 'action'">
                                        <div>
                                            @if ($action ?? false)
                                                {{ $action }}
                                            @endif
                                        </div>
                                    </template>
                                </td>
                            </template>
                        </tr>
                    </template>
                    <template x-if="!loading && !items.length">
                        <tr class="text-center">
                            <td x-bind:colspan="columns.length"
                                class="px-5 py-5 text-sm bg-gray-200 border-b border-gray-200">
                                {{ __('Kosong') }}
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <div class="flex items-center justify-between p-3 bg-gray-100">
                <div>
                    <p class="text-sm leading-5 text-gray-700">
                        Menampilkan
                        <span class="font-medium">1</span>
                        ke
                        <span class="font-medium">10</span>
                        dari
                        <span class="font-medium">199</span>
                        baris
                    </p>
                </div>
                <div>
                    <span class="relative z-0 inline-flex shadow-sm">
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span x-on:click="changePage(pagination.current_page-1)"
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-r-0 border-gray-300 cursor-pointer rounded-l-md"
                                aria-hidden="true">
                                <x-icons.angle-left />
                            </span>
                        </span>
                        <template x-for="item in pages">
                            <span aria-current="page">
                                <span x-on:click="changePage(item)" x-bind:class="{'bg-gray-300' : active == item}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 cursor-pointer "
                                    x-text="
                                    item"></span>
                            </span>
                        </template>
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span x-on:click="changePage(pagination.current_page+1)"
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 cursor-pointer rounded-r-md"
                                aria-hidden="true">
                                <x-icons.angle-right />
                            </span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
