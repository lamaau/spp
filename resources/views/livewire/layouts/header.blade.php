<div x-data="{ open: @entangle('state') }">
    <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
        <div class="flex items-center">
            <button x-on:click="open = true" class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <div class="flex items-center">
            <button class="flex mx-3 text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="relative" x-data="{open: false}">
                <button class="flex mx-3 focus:outline-none" x-on:click="open = !open">
                    <img src="{{ asset('img/default-profile.png') }}" alt="Foto profil" class="w-6">
                </button>
                <div x-show="open" class="absolute right-0 w-36 inset-y-11" style="display: none;"
                    x-transition:enter="transition ease-out origin-top-right duration-200"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition origin-top-right ease-in duration-100"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    <ul x-on:click.away="open = false" class="w-full bg-white rounded-bl rounded-br shadow">
                        <li class="font-medium">
                            <a href="#"
                                class="flex items-center p-2 justify start hover:bg-gray-100 hover:text-gray-900">
                                <x-icons.user class="w-4 mr-2" /> <span class="mt-1 text-sm">Profil</span>
                            </a>
                        </li>
                        <li class="font-medium">
                            <a type="button" x-on:click="$refs.logout.submit();"
                                class="flex items-center justify-start p-2 cursor-pointer hover:bg-gray-100 hover:text-gray-900">
                                <x-icons.logout class="w-4 mr-2" /> <span class="text-sm">Keluar</span>
                            </a>
                            <form x-ref="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
