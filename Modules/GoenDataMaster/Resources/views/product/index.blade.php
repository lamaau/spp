<x-app-layout :title="$title">
    <div class="flex items-center">
        <div class="w-full p-2 md:w-2/4">
            <div class="bg-white rounded shadow">
                <div class="h-64 p-4 bg-gray-400 bg-center bg-no-repeat bg-cover rounded-t"
                    style="background-image: url(https://loremflickr.com/400/340/computer)">
                </div>
                <div class="flex items-start justify-between px-2 pt-2">
                    <div class="flex-grow p-2">
                        <h1 class="text-xl font-medium font-poppins">Product name</h1>
                        <p class="text-gray-500 font-nunito">Short description here</p>
                    </div>
                    <div class="p-2 text-right">
                        <div class="text-lg font-semibold text-teal-500 font-poppins">$40</div>
                        <div class="text-xs text-gray-500 line-through font-poppins">$80</div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-2 pb-2">
                    <div class="w-1/2 p-2">
                        <button
                            class="w-full px-3 py-2 font-medium text-white uppercase bg-indigo-700 rounded focus:outline-none focus:ring-2 hover:bg-indigo-900 font-poppins">
                            Install
                            <x-icons.box class="inline w-4 h-4 -mt-1" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
