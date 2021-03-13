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
            <nav class="mt-5">
                <a href="{{ route('home') }}" class="{{ is_active('home*')['class'] }}">
                    <x-icons.dashboard class="w-5" />
                    <span class="mx-4">Dashboard</span>
                </a>
                <a href="{{ route('student.index') }}" class="{{ is_active('students*')['class'] }}">
                    <x-icons.users class="w-5" />
                    <span class="mx-4">Siswa</span>
                </a>
                <a href="{{ route('question.index') }}" class="{{ is_active('questions*')['class'] }}">
                    <x-icons.book class="w-5" />
                    <span class="mx-4">Bank Soal</span>
                </a>
                <a href="{{ route('setting.index') }}" class="{{ is_active('settings*')['class'] }}">
                    <x-icons.cog class="w-5" />
                    <span class="mx-4">Pengaturan</span>
                </a>
            </nav>
        </div>
    </div>
</div>
