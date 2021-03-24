<x-app-layout :title="$title">
    <h2 class="mb-2 text-xl font-semibold leading-tight text-gray-700">
        Tambah siswa baru
    </h2>
    <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow">
        <div class="mb-6 -mx-3 md:flex">
            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                    for="grid-first-name">
                    Nama Depan
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                    id="grid-first-name" type="text">
                <p class="text-xs italic text-red-600">Please</p>
            </div>
            <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                    for="grid-last-name">
                    Nama belakang
                </label>
                <input
                    class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    id="grid-last-name" type="text">
            </div>
        </div>
        <div class="mb-6 -mx-3 md:flex">
            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                    for="grid-first-name">
                    Nomor induk siswa
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                    id="grid-first-name" type="text">
            </div>
            <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                    for="grid-last-name">
                    Nomor induk siswa nasional
                </label>
                <input
                    class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    id="grid-last-name" type="text">
            </div>
        </div>
        <div class="mb-2 -mx-3 md:flex">
            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-city">
                    City
                </label>
                <input
                    class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    id="grid-city" type="text" placeholder="Albuquerque">
            </div>
            <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                    State
                </label>
                <div class="relative">
                    <select
                        class="block w-full px-4 py-3 pr-8 border rounded appearance-none bg-grey-lighter border-grey-lighter text-grey-darker"
                        id="grid-state">
                        <option>New Mexico</option>
                        <option>Missouri</option>
                        <option>Texas</option>
                    </select>
                    <div class="absolute flex items-center px-2 pointer-events-none pin-y pin-r text-grey-darker">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-zip">
                    Zip
                </label>
                <input
                    class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    id="grid-zip" type="text" placeholder="90210">
            </div>
        </div>
    </div>
</x-app-layout>
