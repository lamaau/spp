<div class="flex" x-data="{toggleSidebar: false}">
    <!-- Backdrop -->
    <div x-on:keydown.escape.window="toggleSidebar = false" x-on:click="toggleSidebar = false" x-show="toggleSidebar"
        x-on:toggle-sidebar.window="toggleSidebar = true"
        class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" style="display: none;">
    </div>
    <!-- End Backdrop -->

    <div x-bind:class="{ toggleSidebar : 'translate-x-0 ease-out', '-translate-x-full ease-in' : !(toggleSidebar) }"
        class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform -translate-x-full bg-gray-900 scroll-component lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex flex-col items-center">
                <img src="{{ $setting->logo }}" alt="Logo Sekolah" class="w-16 rounded-full">
                <span class="px-8 mt-6 text-2xl font-semibold text-center text-white">{{ $setting->name }}</span>
            </div>
        </div>
        <div>
            <ul class="mt-5" x-data="{isMasterOpen: '{{ is_active('rooms')['state'] }}'}">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ is_active('dashboard')['class'] }}">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.5578 5.53423C12.6872 4.69887 11.3127 4.69887 10.4421 5.53423L5.81568 9.97357C5.70233 10.0823 5.62608 10.224 5.59774 10.3785C5.04361 13.4004 5.00271 16.494 5.47675 19.5295L5.58927 20.25H8.56573V14.0387C8.56573 13.6244 8.90152 13.2887 9.31573 13.2887H14.6842C15.0984 13.2887 15.4342 13.6244 15.4342 14.0387V20.25H18.4106L18.5231 19.5295C18.9972 16.494 18.9563 13.4004 18.4021 10.3785C18.3738 10.224 18.2976 10.0823 18.1842 9.97357L13.5578 5.53423ZM9.40357 4.45191C10.8545 3.05965 13.1454 3.05965 14.5963 4.45191L19.2227 8.89125C19.5633 9.21804 19.7924 9.64373 19.8775 10.108C20.4621 13.2956 20.5052 16.559 20.0052 19.7609L19.8244 20.9184C19.7496 21.3971 19.3374 21.75 18.8529 21.75H14.6842C14.2699 21.75 13.9342 21.4142 13.9342 21V14.7887H10.0657V21C10.0657 21.4142 9.72994 21.75 9.31573 21.75H5.147C4.66252 21.75 4.25023 21.3971 4.17548 20.9184L3.99472 19.7609C3.49467 16.559 3.53781 13.2956 4.12234 10.108C4.20748 9.64373 4.43656 9.21804 4.77713 8.89125L9.40357 4.45191Z"
                                fill="black" />
                        </svg>
                        <span class="mx-4">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" x-on:click="isMasterOpen = !isMasterOpen" class="{{ is_active('rooms')['class'] }}">
                        <svg x-show="!isMasterOpen" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.6016 16.9757C20.0236 14.6662 20.0501 12.3017 19.6801 9.98322L19.616 9.58178C19.5263 9.0197 19.0414 8.60612 18.4722 8.60612H9.75939C9.17432 8.60612 8.70003 8.13183 8.70003 7.54677C8.70003 7.10672 8.34331 6.75 7.90327 6.75H5.6117C5.01467 6.75 4.51179 7.19611 4.4406 7.78888L4.16812 10.058C3.89639 12.3208 3.96652 14.6116 4.37615 16.8536C4.46868 17.36 4.8922 17.7396 5.40568 17.7763L6.91968 17.8846C10.3023 18.1266 13.6978 18.1266 17.0804 17.8846L18.7183 17.7674C19.1588 17.7359 19.5222 17.4102 19.6016 16.9757ZM21.1613 9.74679C21.5581 12.233 21.5297 14.7686 21.0772 17.2453C20.8748 18.353 19.9484 19.1833 18.8253 19.2636L17.1874 19.3808C13.7336 19.6279 10.2665 19.6279 6.81264 19.3808L5.29864 19.2725C4.10261 19.1869 3.1161 18.3027 2.90058 17.1232C2.46392 14.7333 2.38916 12.2913 2.67882 9.87915L2.9513 7.61004C3.11301 6.26343 4.25541 5.25 5.6117 5.25L7.90327 5.25C9.02102 5.25 9.95229 6.04846 10.1578 7.10612L18.4722 7.10612C19.7786 7.10612 20.8913 8.05533 21.0972 9.34535L21.1613 9.74679Z" />
                        </svg>
                        <svg x-show="isMasterOpen" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.3613 18.5795C19.9557 18.97 19.4179 19.2212 18.8253 19.2636L17.1874 19.3808C13.7336 19.6279 10.2665 19.6279 6.81264 19.3808L5.29864 19.2725C4.10261 19.1869 3.1161 18.3027 2.90058 17.1232C2.46392 14.7333 2.38916 12.2913 2.67882 9.87915L2.9513 7.61004C3.11301 6.26343 4.25541 5.25 5.6117 5.25H7.90327C9.02102 5.25 9.95229 6.04846 10.1578 7.10612L18.4722 7.10612C19.7786 7.10612 20.8913 8.05533 21.0972 9.34535L21.1613 9.74679C21.1748 9.83114 21.1877 9.91554 21.2002 10H21.5362C23.0086 10 24.0209 11.4798 23.4873 12.8521L22.2378 16.065C21.8498 17.0626 21.1989 17.9301 20.3613 18.5795ZM19.616 9.58178L19.6801 9.98322C19.6809 9.98881 19.6818 9.99441 19.6827 10H10.3705C9.23475 10 8.21588 10.6981 7.80589 11.7573L5.47405 17.7812L5.40568 17.7763C4.8922 17.7396 4.46868 17.36 4.37615 16.8536C3.96652 14.6116 3.89639 12.3208 4.16812 10.058L4.4406 7.78888C4.51179 7.19611 5.01467 6.75 5.6117 6.75H7.90327C8.34331 6.75 8.70003 7.10672 8.70003 7.54677C8.70003 8.13183 9.17432 8.60612 9.75939 8.60612H18.4722C19.0414 8.60612 19.5263 9.0197 19.616 9.58178ZM7.03921 17.8931C10.3822 18.1266 13.7376 18.1238 17.0804 17.8846L18.7183 17.7674L18.9128 17.7492L18.9115 17.7468C19.792 17.25 20.4734 16.4636 20.8398 15.5213L22.0893 12.3084C22.2405 11.9195 21.9536 11.5 21.5362 11.5H10.3705C9.85423 11.5 9.3911 11.8173 9.20475 12.2988L7.03921 17.8931Z"
                                fill="black" />
                        </svg>
                        <span class="mx-4">Data Master</span>
                    </a>
                    <ul class="w-full p-2 space-y-2" style="display: none;" x-show="isMasterOpen"
                        x-transition:enter="transition ease-in-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
                        x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
                        x-transition:leave="transition ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
                        x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2">
                        <li>
                            <a href="{{ route('master.room.index') }}"
                                x-bind:class="{ 'text-white' : '{{ is_active('rooms')['state'] }}', 'text-gray-500' : !('{{ is_active('rooms')['state'] }}') }"
                                class="flex items-center pl-12 duration-200 hover:text-gray-100">
                                <svg width="13px" height="13px" class="mx-3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 16 13 C 14.34375 13 13 14.34375 13 16 C 13 17.65625 14.34375 19 16 19 C 17.65625 19 19 17.65625 19 16 C 19 14.34375 17.65625 13 16 13 Z" />
                                </svg>
                                Kelas
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center pl-12 text-gray-500 duration-200 hover:text-gray-100">
                                <svg width="13px" height="13px" class="mx-3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 16 13 C 14.34375 13 13 14.34375 13 16 C 13 17.65625 14.34375 19 16 19 C 17.65625 19 19 17.65625 19 16 C 19 14.34375 17.65625 13 16 13 Z" />
                                </svg>
                                Siswa
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{ is_active('reports')['class'] }}">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 9.74995C13.5 9.33574 13.1642 8.99995 12.75 8.99995H6.75C6.33579 8.99995 6 9.33574 6 9.74995C6 10.1642 6.33579 10.5 6.75 10.5H12.75C13.1642 10.5 13.5 10.1642 13.5 9.74995Z"
                                fill="currentColor" />
                            <path
                                d="M12.5 12.75C12.5 12.3357 12.1642 12 11.75 12H6.75C6.33579 12 6 12.3357 6 12.75C6 13.1642 6.33579 13.5 6.75 13.5H11.75C12.1642 13.5 12.5 13.1642 12.5 12.75Z"
                                fill="currentColor" />
                            <path
                                d="M12.75 15C13.1642 15 13.5 15.3357 13.5 15.75C13.5 16.1642 13.1642 16.5 12.75 16.5H6.75C6.33579 16.5 6 16.1642 6 15.75C6 15.3357 6.33579 15 6.75 15H12.75Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6 21.75H19C20.5188 21.75 21.75 20.5187 21.75 19V13.5C21.75 13.0857 21.4142 12.75 21 12.75H17.75V4.94315C17.75 3.51975 16.1411 2.69178 14.9828 3.51912L14.8078 3.64415C14.0273 4.20164 12.9701 4.19977 12.1859 3.63966C10.8821 2.70833 9.11794 2.70833 7.81407 3.63966C7.02992 4.19977 5.9727 4.20164 5.19221 3.64415L5.01717 3.51912C3.8589 2.69178 2.25 3.51975 2.25 4.94315V18C2.25 20.071 3.92893 21.75 6 21.75ZM8.68593 4.86026C9.46825 4.30146 10.5318 4.30146 11.3141 4.86026C12.6161 5.79028 14.3739 5.79739 15.6796 4.86475L15.8547 4.73972C16.0202 4.62153 16.25 4.73981 16.25 4.94315V19C16.25 19.4501 16.3581 19.8749 16.5499 20.25H6C4.75736 20.25 3.75 19.2426 3.75 18V4.94315C3.75 4.73981 3.97984 4.62153 4.14531 4.73972L4.32036 4.86475C5.62605 5.79739 7.3839 5.79028 8.68593 4.86026ZM17.75 19V14.25H20.25V19C20.25 19.6903 19.6904 20.25 19 20.25C18.3096 20.25 17.75 19.6903 17.75 19Z"
                                fill="currentColor" />
                        </svg>
                        <span class="mx-4">Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="absolute flex items-center max-w-sm p-3 mx-auto space-x-4 bg-gray-800 shadow-md bottom-6 inset-x-2 rounded-xl">
            <div class="relative flex-shrink-0">
                <img src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Profile Picture"
                    class="block h-12 mx-auto rounded-full sm:mx-0 sm:flex-shrink-0">
                <span class="absolute right-0 flex items-center w-3 h-3 bg-green-500 border-2 border-white rounded-full bottom-1"></span>
            </div>
            <div>
                <div class="font-medium text-gray-200 text-md">Ursula</div>
                <p class="text-xs text-gray-200">Admin</p>
            </div>
        </div>
    </div>
</div>
