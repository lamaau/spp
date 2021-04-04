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
                <x-icons.logo class="w-16" fill="white" />
                <span class="mt-6 text-2xl font-semibold text-white">GOENGE.ID</span>
            </div>
        </div>
        <div>
            <ul class="mt-5">
                <li>
                    <a href="{{ route('home') }}" class="{{ is_active('home')['class'] }}">
                        <x-icons.dashboard class="w-5" />
                        <span class="mx-4">Dashboard</span>
                    </a>
                </li>
                <li
                    x-data="{isOpen: '{{ is_active(['rooms*', 'levels*', 'students*'])['status'] }}'}">
                    <div class="relative">
                        <a href="#" x-on:click="isOpen = !isOpen"
                            class="{{ is_active(['rooms*', 'levels*', 'students*'])['class'] }}">
                            <x-icons.folder class="w-5" />
                            <span class="mx-4">Data Master</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            x-bind:style="isOpen ? 'transform: rotate(-90deg)' : ''"
                            class="absolute w-4 h-4 text-gray-500 inset-y-3 right-4 feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </div>
                    <ul class="ml-16 overflow-hidden font-normal"
                        x-bind:style="isOpen ? 'height: 8.3rem' : 'height: 0'">
                        <li>
                            <a href="{{ route('level.index') }}"
                                class="{{ is_active('levels*')['status'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Level
                            </a>
                            <a href="{{ route('room.index') }}"
                                class="{{ is_active('rooms*')['status'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Kelas
                            </a>
                            <a href="{{ route('student.index') }}"
                                class="{{ is_active('students*')['status'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Siswa
                            </a>
                        </li>
                    </ul>
                </li>
                <li x-data="{isOpen: '{{ is_active(['schedules*', 'questions*'])['status'] }}'}">
                    <div class="relative">
                        <a href="#" x-on:click="isOpen = !isOpen"
                            class="{{ is_active(['schedules*', 'questions*'])['class'] }}">
                            <x-icons.folder class="w-5" />
                            <span class="mx-4">CBT</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            x-bind:style="isOpen ? 'transform: rotate(-90deg)' : ''"
                            class="absolute w-4 h-4 text-gray-500 inset-y-3 right-4 feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </div>
                    <ul class="ml-16 overflow-hidden font-normal"
                        x-bind:style="isOpen ? 'height: 5.6rem' : 'height: 0'">
                        <li>
                            <a href="{{ route('question.index') }}"
                                class="{{ is_active('questions*')['status'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Bank Soal
                            </a>
                            <a href="{{ route('schedule.index') }}"
                                class="{{ is_active('schedules*')['status'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Jadwal
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('invoice.index') }}" class="{{ is_active('invoice*')['class'] }}">
                        <x-icons.paperclip class="w-5" />
                        <span class="mx-4">Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.index') }}" class="{{ is_active('settings*')['class'] }}">
                        <x-icons.cog class="w-5" />
                        <span class="mx-4">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
