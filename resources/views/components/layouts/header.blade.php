<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-500 shadow">
    <div x-data="{}" class="flex items-center">
        <button x-on:click="$dispatch('toggle-sidebar')" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <button class="flex items-center mx-3 space-x-2 font-semibold text-gray-800 focus:outline-none">
            {{-- <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                    d="M2.74976 12.7755C2.74976 5.81947 5.06876 3.50146 12.0238 3.50146C18.9798 3.50146 21.2988 5.81947 21.2988 12.7755C21.2988 19.7315 18.9798 22.0495 12.0238 22.0495C5.06876 22.0495 2.74976 19.7315 2.74976 12.7755Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 3" d="M3.02515 9.32397H21.0331" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 5" d="M16.4284 13.261H16.4374" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 7" d="M12.0289 13.261H12.0379" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 9" d="M7.62148 13.261H7.63048" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 11" d="M16.4284 17.113H16.4374" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 13" d="M12.0289 17.113H12.0379" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 15" d="M7.62148 17.113H7.63048" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 17" d="M16.033 2.05005V5.31205" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 19" d="M8.02466 2.05005V5.31205" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg> --}}
            <span class="text-xs">{{ date('F d, Y') }}</span>
        </button>
        <button class="relative flex mx-3 text-gray-800 focus:outline-none">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                    d="M11.9961 2.51416C7.56185 2.51416 5.63519 6.5294 5.63519 9.18368C5.63519 11.1675 5.92281 10.5837 4.82471 13.0037C3.48376 16.4523 8.87614 17.8618 11.9961 17.8618C15.1152 17.8618 20.5076 16.4523 19.1676 13.0037C18.0695 10.5837 18.3571 11.1675 18.3571 9.18368C18.3571 6.5294 16.4295 2.51416 11.9961 2.51416Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path id="Stroke 3" d="M14.306 20.5122C13.0117 21.9579 10.9927 21.9751 9.68604 20.5122"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="absolute top-0 w-2 h-2 bg-red-500 border border-white rounded-full right-0.5"></span>
        </button>
        {{-- <div class="relative" x-data="{open: false}">
            <button class="flex mx-3 focus:outline-none" x-on:click="open = !open">
                <img src="{{ asset('img/default-profile.png') }}" alt="Foto profil" class="w-6">
                <span class="text-gray-500 ml-2 mt-0.5 items-center text-sm">{{ auth()->user()->name }}</span>
            </button>
            <div x-show="open" class="absolute right-0 z-50 w-36 inset-y-11" style="display: none;"
                x-transition:enter="transition ease-out origin-top-right duration-200"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition origin-top-right ease-in duration-100"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">
                <ul x-on:click.away="open = false" class="w-full bg-white rounded-bl rounded-br shadow">
                    <li class="text-md">
                        <a href="#" class="flex items-center p-2 justify start hover:bg-gray-100 hover:text-gray-900">
                            <svg class="w-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="Iconly/Curved/Profile">
                                    <g id="Profile">
                                        <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.8445 21.6618C8.15273 21.6618 5 21.0873 5 18.7865C5 16.4858 8.13273 14.3618 11.8445 14.3618C15.5364 14.3618 18.6891 16.4652 18.6891 18.766C18.6891 21.0658 15.5564 21.6618 11.8445 21.6618Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.8372 11.1735C14.26 11.1735 16.2236 9.2099 16.2236 6.78718C16.2236 4.36445 14.26 2.3999 11.8372 2.3999C9.41452 2.3999 7.44998 4.36445 7.44998 6.78718C7.4418 9.20172 9.3918 11.1654 11.8063 11.1735C11.8172 11.1735 11.8272 11.1735 11.8372 11.1735Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </g>
                            </svg>
                            Profil
                        </a>
                    </li>
                    <li class="text-md">
                        <a type="button" x-on:click="$refs.logout.submit();"
                            class="flex items-center justify-start p-2 cursor-pointer hover:bg-gray-100 hover:text-gray-900">
                            <svg class="w-4 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="Iconly/Curved/Logout">
                                    <g id="Logout">
                                        <path id="Stroke 1" d="M21.791 12.1208H9.75" stroke="#130F26" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path id="Stroke 3" d="M18.8643 9.20483L21.7923 12.1208L18.8643 15.0368"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path id="Stroke 4"
                                            d="M16.3597 7.63C16.0297 4.05 14.6897 2.75 9.35974 2.75C2.25874 2.75 2.25874 5.06 2.25874 12C2.25874 18.94 2.25874 21.25 9.35974 21.25C14.6897 21.25 16.0297 19.95 16.3597 16.37"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </g>
                            </svg>
                            Keluar
                        </a>
                        <form x-ref="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div> --}}
    </div>
</header>
