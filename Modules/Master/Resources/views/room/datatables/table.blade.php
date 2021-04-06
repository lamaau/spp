<div>
    <h2 class="mb-4 text-xl font-semibold leading-tight text-gray-700">Daftar Kelas</h2>
    <div class="flex flex-col items-center sm:flex-row sm:justify-between">
        <div class="flex flex-col items-center mb-4 space-x-2 sm:flex-row md:mb-0">
            <div>
                <select
                    class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                </select>
            </div>
            <div class="relative block mt-2 sm:mt-0">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2"><svg viewBox="0 0 24 24"
                        class="w-4 h-4 text-gray-500 fill-current">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg></span>
                <input placeholder="Search" type="search" name="search" wire:model.debounce.750ms='search'
                    class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-400 rounded appearance-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
            </div>
        </div>
        <div class="space-x-1">
            <button type="button"
                class="p-2 text-white bg-indigo-500 rounded focus:outline-none focus:ring-2 focus:ring-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
            </button>
            <button type="button"
                class="p-2 text-white bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 9.5C13.3809 9.5 14.5 10.6191 14.5 12C14.5 13.3809 13.3809 14.5 12 14.5C10.6191 14.5 9.5 13.3809 9.5 12C9.5 10.6191 10.6191 9.5 12 9.5Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                        d="M20.168 7.25025V7.25025C19.4845 6.05799 17.9712 5.65004 16.7885 6.33852C15.7598 6.93613 14.4741 6.18838 14.4741 4.99218C14.4741 3.61619 13.3659 2.5 11.9998 2.5V2.5C10.6337 2.5 9.52546 3.61619 9.52546 4.99218C9.52546 6.18838 8.23977 6.93613 7.21199 6.33852C6.02829 5.65004 4.51507 6.05799 3.83153 7.25025C3.14896 8.4425 3.55399 9.96665 4.73769 10.6541C5.76546 11.2527 5.76546 12.7473 4.73769 13.3459C3.55399 14.0343 3.14896 15.5585 3.83153 16.7498C4.51507 17.942 6.02829 18.35 7.21101 17.6625H7.21199C8.23977 17.0639 9.52546 17.8116 9.52546 19.0078V19.0078C9.52546 20.3838 10.6337 21.5 11.9998 21.5V21.5C13.3659 21.5 14.4741 20.3838 14.4741 19.0078V19.0078C14.4741 17.8116 15.7598 17.0639 16.7885 17.6625C17.9712 18.35 19.4845 17.942 20.168 16.7498C20.8515 15.5585 20.4455 14.0343 19.2628 13.3459H19.2618C18.2341 12.7473 18.2341 11.2527 19.2628 10.6541C20.4455 9.96665 20.8515 8.4425 20.168 7.25025Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
    <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        @if ($checkbox)
                            <th
                                class="w-4 p-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <input type="checkbox" wire:model="checkbox_all"
                                    class="border border-gray-300 rounded" />
                            </th>
                        @endif

                        @foreach ($columns as $column)
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 {{ $column->attribute }}">
                                @if ($column->sortable)
                                    <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                                        {{ $column->heading }}
                                        @if ($sorting['attribute'] == $column->attribute)
                                            <i
                                                class="fa fa-sort-amount-{{ $sorting['direction'] == 'asc' ? 'up-alt' : 'down' }}"></i>
                                        @else
                                            <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                                        @endif
                                    </span>
                                @else
                                    {{ $column->heading }}
                                @endif
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td
                                class="w-4 p-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <input type="checkbox" class="border border-gray-300 rounded"
                                    wire:model="checkbox_values" value="{{ $model->{$checkbox_attribute} }}" />
                            </td>
                            <td class="px-4 py-4 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-nowrap">{{ $model->name }}</p>
                            </td>
                            <td class="px-4 py-4 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-nowrap">{{ $model->code }}</p>
                            </td>
                            <td class="px-4 py-4 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-nowrap">{{ $model->description ?? '-' }}</p>
                            </td>
                            <td class="px-4 py-4 text-sm bg-white border-b border-gray-200">
                                <button type="button"
                                    class="p-2 text-white bg-yellow-500 rounded focus:outline-none focus:ring-2 focus:ring-yellow-300">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path id="Stroke 1" d="M13.3352 19.5078H19.7122" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.0578 4.85901V4.85901C14.7138 3.85101 12.8078 4.12301 11.7998 5.46601C11.7998 5.46601 6.78679 12.144 5.04779 14.461C3.30879 16.779 4.95379 19.651 4.95379 19.651C4.95379 19.651 8.19779 20.397 9.91179 18.112C11.6268 15.828 16.6638 9.11701 16.6638 9.11701C17.6718 7.77401 17.4008 5.86701 16.0578 4.85901Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path id="Stroke 5" d="M10.5042 7.21143L15.3682 10.8624" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="p-2 text-white bg-red-500 rounded focus:outline-none focus:ring-2 focus:ring-red-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $models->links() }}
            </div>
        </div>
    </div>
</div>
