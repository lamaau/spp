<div>
    <x-modal x-state="open">
        <div class="items-center md:flex">
            <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 mx-auto rounded-full">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 388.219 388.219"
                    style="enable-background:new 0 0 388.219 388.219;" xml:space="preserve">
                    <path style="fill:#FF793B;"
                        d="M160.109,182.619c0.8,6.8-6,11.6-12,8c-22-12.8-32.8-36.4-47.2-56.8c-23.2,36.8-40.8,72.4-40.8,110.4 c0,77.2,54.8,136,132,136s136-58.8,136-136c0-96.8-101.2-113.6-100-236C187.309,37.019,148.909,101.419,160.109,182.619z" />
                    <path style="fill:#C6490F;"
                        d="M192.109,388.219c-81.2,0-140-60.4-140-144c0-42,20.4-80,42-114.8c1.6-2.4,4-3.6,6.4-3.6 c2.8,0,5.2,1.2,6.8,3.2c3.6,4.8,6.8,10,10,15.2c10,15.6,19.6,30.4,34.8,39.2l0,0c-11.6-82.8,27.6-151.2,71.2-182 c2.4-1.6,5.6-2,8.4-0.4c2.8,1.2,4.4,4,4.4,7.2c-0.8,62,26.4,96,52.4,128.4c23.6,29.2,47.6,59.2,47.6,107.6 C336.109,326.219,274.109,388.219,192.109,388.219z M101.309,148.619c-18,29.6-33.2,61.6-33.2,95.6c0,74,52,128,124,128 c72.8,0,128-55.2,128-128c0-42.8-20.4-68-44-97.6c-24.4-30.4-51.6-64.4-55.6-122c-34.4,31.2-62,88.4-52.4,156.8l0,0 c0.8,6.4-2,12.4-7.2,15.6c-5.2,3.2-11.6,3.2-16.8,0c-18.4-10.8-29.2-28-40-44.4C102.909,151.419,102.109,150.219,101.309,148.619z" />
                    <path style="fill:#FF793B;" d="M278.109,304.219c14-21.6,22-47.6,22-76" />
                    <path style="fill:#C6490F;"
                        d="M278.109,312.219c-1.6,0-3.2-0.4-4.4-1.2c-3.6-2.4-4.8-7.2-2.4-11.2c13.6-20.8,20.8-45.6,20.8-71.6 c0-4.4,3.6-8,8-8s8,3.6,8,8c0,29.2-8,56.8-23.2,80.4C283.309,311.019,280.909,312.219,278.109,312.219z" />
                    <path style="fill:#FF793B;" d="M253.709,332.219c2.8-2.4,6-5.2,8.4-8" />
                    <path style="fill:#C6490F;"
                        d="M253.709,340.219c-2.4,0-4.4-0.8-6-2.8c-2.8-3.2-2.4-8.4,0.8-11.2c2.4-2.4,5.6-4.8,7.6-7.2 c2.8-3.2,8-3.6,11.2-0.8c3.2,2.8,3.6,8,0.8,11.2c-2.8,3.2-6.4,6.4-9.2,8.8C257.309,339.419,255.709,340.219,253.709,340.219z" />
                </svg>
            </div>
            <div class="mt-4 text-center md:mt-0 md:ml-6 md:text-left">
                <p class="font-bold">Hapus Kelas</p>
                <p class="mt-1 text-sm text-gray-700">Tindakan ini akan menghapus kelas secara permanen, data
                    yang telah dihapus tidak dapat dikembalikan.
                </p>
            </div>
        </div>
        <div class="mt-4 text-center md:text-right md:flex md:justify-end">
            <button x-on:click="remove"
                class="block w-full px-4 py-3 text-sm font-semibold text-red-700 bg-red-200 rounded-lg md:inline-block md:w-auto md:py-2 md:ml-2 md:order-2 focus:ring-2 focus:ring-red-300 focus:outline-none">Hapus</button>
            <button x-on:click="open = false"
                class="block w-full px-4 py-3 mt-4 text-sm font-semibold bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 md:inline-block md:w-auto md:py-2 md:mt-0 md:order-1">Batal</button>
        </div>
    </x-modal>
</div>
