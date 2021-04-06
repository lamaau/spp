<x-auth-layout>
    @section('content')
        <div class="sm:px-4">
            <div class="sm:pt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="text-4xl font-extrabold text-center text-gray-700">
                    <a href="#">
                        GOENGE.ID
                    </a>
                </h1>
                <h2 class="mt-4 text-2xl font-extrabold leading-9 text-center text-gray-700">
                    {{ __('Atur Aplikasi Anda') }}
                </h2>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
                <form action="{{ route('setup') }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow" method="post">
                    @csrf
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label for="name" class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Nama Sekolah') }}
                            </label>
                            <input id="name"
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('name') border-red-600 mb-2 @enderror"
                                name="name" value="{{ old('name') }}" type="text">
                            @error('name')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                        <div class="px-3 md:w-1/2">
                            <label for="code" class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Kode Sekolah') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('code') border-red-600 mb-2 @enderror"
                                name="code" value="{{ old('code') }}" type="text">
                            @error('code')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label for="level"
                                class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Tingkat Sekolah') }}
                            </label>
                            <select name="level" id="level"
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('level') border-red-600 mb-2 @enderror">
                                <option selected disabled style="display: none;"></option>
                                @foreach ($levels as $key => $level)
                                    <option value="{{ $key }}" {{old('level') == $key ? 'selected' : ''}}>{{ $level }}</option>
                                @endforeach
                            </select>
                            @error('level')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="px-3 md:w-1/2">
                            <label for="fax" class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Fax Sekolah') }}
                            </label>
                            <input id="fax"
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('fax') border-red-600 mb-2 @enderror"
                                name="fax" value="{{ old('fax') }}" type="text">
                            @error('fax')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label for="principal"
                                class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Kepala Sekolah') }}
                            </label>
                            <input id="principal"
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('principal') border-red-600 mb-2 @enderror"
                                name="principal" value="{{ old('principal') }}" type="text">
                            @error('principal')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                        <div class="px-3 md:w-1/2">
                            <label for="principal_number"
                                class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('NIP Kepala Sekolah') }}
                            </label>
                            <input id="principal_number"
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('principal_number') border-red-600 mb-2 @enderror"
                                name="principal_number" value="{{ old('principal_number') }}" type="text">
                            @error('principal_number')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="logo" class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Logo Sekolah') }}
                            </label>
                            <input id="logo"
                                class="block w-full px-4 py-3 border rounded appearance-none border-gray-500 bg-grey-lighter text-grey-darker @error('logo') border-red-600 mb-2 @enderror"
                                name="logo" value="{{ old('logo') }}" type="file">
                            @error('logo')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="address"
                                class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Alamat Sekolah') }}
                            </label>
                            <textarea name="address"
                                class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker @error('address') border-red-600 mb-2 @enderror"
                                id="address"></textarea>
                            @error('address')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="md:flex">
                        <div class="md:w-full">
                            <button class="w-full py-3 text-white bg-gray-800 rounded shadow" type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-auth-layout>
