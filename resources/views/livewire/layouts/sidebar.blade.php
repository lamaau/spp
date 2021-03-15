<div class="flex" x-data="{ open: @entangle('state') }">
    <!-- Backdrop -->
    <div x-on:click="open = false" x-show="open"
        class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" style="display: none;">
    </div>
    <!-- End Backdrop -->

    <div x-bind:class="{ open : 'translate-x-0 ease-out', '-translate-x-full ease-in' : !(open) }"
        class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform -translate-x-full bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex flex-col items-center">
                <x-icons.logo class="w-16" fill="white" />
                <span class="mt-6 text-2xl font-semibold text-white">GOEN - CBT</span>
            </div>
        </div>
        <div>
            <ul class="mt-5">
                <li>
                    <a href="{{ route('home') }}" class="{{ $this->is_active('home*')['class'] }}">
                        <x-icons.dashboard class="w-5" />
                        <span class="mx-4">Dashboard</span>
                    </a>
                </li>
                <li x-data="{ open: false }">
                    <div class="relative">
                        <a href="#" x-on:click="open = !open" class="{{ $this->is_active(['rooms', 'levels'])['class'] }}">
                            <x-icons.folder class="w-5" />
                            <span class="mx-4">Data Master</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            x-bind:class="{'text-white' : open, 'text-gray-500' : !(open)}"
                            x-bind:style="open ? 'transform: rotate(-90deg)' : ''"
                            class="absolute w-4 h-4 inset-y-3 right-4 feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </div>
                    <ul class="ml-16 overflow-hidden font-normal">
                        <li>
                            <a href="{{ route('level.index') }}"
                                class="{{ $this->is_active('levels')['state'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Level
                            </a>
                            <a href="{{ route('room.index') }}"
                                class="{{ $this->is_active('rooms')['state'] ? 'text-gray-100' : 'text-gray-500' }} flex items-center py-2 mt-1 border-gray-900 hover:text-gray-100">
                                Kelas
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('student.index') }}" class="{{ $this->is_active('students*')['class'] }}">
                        <x-icons.users class="w-5" />
                        <span class="mx-4">Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('question.index') }}" class="{{ $this->is_active('questions*')['class'] }}">
                        <x-icons.book class="w-5" />
                        <span class="mx-4">Bank Soal</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('schedule.index') }}" class="{{ $this->is_active('schedules*')['class'] }}">
                        <x-icons.clock class="w-5" />
                        <span class="mx-4">Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.index') }}" class="{{ $this->is_active('settings*')['class'] }}">
                        <x-icons.cog class="w-5" />
                        <span class="mx-4">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
