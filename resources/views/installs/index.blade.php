<x-app-layout title="Atur Aplikasi Anda">
    <div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600">
            </x-logo>
            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                {{ __('Atur Aplikasi Anda') }}
            </h2>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
            <form action="{{ route('store.install') }}"
                class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow" method="post">
                @csrf
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Nama Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border border-red-200 rounded appearance-none bg-grey-lighter text-grey-darker"
                            name="name" type="text">
                        <p class="text-xs italic text-red-500">
                            Please fill out this field.
                        </p>
                        </input>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Email Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="email" type="text">
                        </input>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Telpon Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="phone" type="text" />
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Fax') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="fax" type="text">
                        </input>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Kode Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="code" type="text" />
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-state">
                            {{ __('Derajat') }}
                        </label>
                        <select
                            class="block w-full px-4 py-3 pr-8 border rounded appearance-none bg-grey-lighter border-grey-lighter text-grey-darker"
                            name="level">
                            @foreach ($levels as $key => $level)
                                <option value="{{ $key }}">
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Kepala Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="principal" type="text">
                        </input>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Nip') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="principal_number" type="text">
                        </input>
                    </div>
                </div>
                <div class="mb-6 md:flex">
                    <div class="md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Detail Alamat') }}
                        </label>
                        <textarea
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="detail_address">
                        </textarea>
                    </div>
                </div>
                <div class="mb-6 md:flex">
                    <div class="md:w-full">
                        <button class="w-full p-2 text-white bg-gray-900 rounded shadow" type="submit">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
