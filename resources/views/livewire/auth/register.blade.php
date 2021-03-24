<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-icons.logo class="w-24 mx-auto" fill="#2d3748" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
            Buat akun baru
        </h2>

        <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
            Atau
            <a href="{{ route('login') }}"
                class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                masuk ke akun anda
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Nama
                    </label>

                    <div class="mt-1 rounded shadow-sm">
                        <input wire:model.lazy="name" id="name" type="text" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Alamat email
                    </label>

                    <div class="mt-1 rounded shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Domain
                    </label>
                    <div class="flex mt-1">
                        <input wire:model.lazy='domain' type="text" class="w-full px-3 py-2 border border-gray-300 rounded-l text-md " />
                        <div
                            class="flex items-center justify-center px-3 py-2 border-t border-b border-r border-gray-300 rounded-r">
                            {{ \App\Utils\Host::domain() }}</div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Kata Sandi
                    </label>

                    <div class="mt-1 rounded shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                        Konfirmasi kata sandi
                    </label>

                    <div class="mt-1 rounded shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password"
                            required
                            class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded appearance-none focus:outline-none sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700">
                            Daftar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
