<div x-data="handler" x-on:notice.window="add($event.data)">
    <div class="fixed right-0 z-50 flex flex-col-reverse items-start justify-start mt-4 mr-4">
        <template x-for="notice of notices" x-bind:key="notice.id">
            <div x-show="visible.includes(notice)" x-transition:enter="transition ease-in duration-200"
                x-transition:enter-start="transform opacity-0 -translate-y-2"
                x-transition:enter-end="transform opacity-100" x-transition:leave="transition ease-out duration-500"
                x-transition:leave-start="transform translate-x-0 opacity-100"
                x-transition:leave-end="transform translate-x-full opacity-0" class="mt-2" style="display: none;">
                <div class="flex items-start p-3 space-x-2 bg-white border border-gray-300 rounded-md shadow-lg">
                    {{-- <x-icons.circle-check class="w-6 ml-0 text-green-400" x-show="notice.type === 'success'" />
                    <x-icons.circle-x class="w-6 ml-0 text-red-400" x-show="notice.type === 'error'" /> --}}
                    <div class="flex-1 space-y-1">
                        <p class="text-base font-medium leading-6 text-gray-700">
                            <span x-text="notice.title"></span>
                        </p>
                        <p class="text-sm leading-5 text-gray-600">
                            <span x-text="notice.message"></span>
                        </p>
                    </div>
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 cursor-pointer" x-on:click="remove(notice.id)"
                        stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-width="1.2"
                            d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                        </path>
                    </svg>
                </div>
            </div>
        </template>
    </div>
</div>

<script type="text/javascript">
    const handler = {
        notices: [],
        visible: [],
        add: function(notice) {
            this.notices.push(notice);
            this.fire(notice.id);
        },
        fire: function(id) {
            this.visible.push(this.notices.find(notice => notice.id === id));

            const timeShown = 5000 * this.visible.length;
            setTimeout(() => {
                this.remove(id);
            }, timeShown);
        },
        remove: function(id) {
            const notice = this.visible.find(notice => notice.id === id);
            const index = this.visible.indexOf(notice);
            this.visible.splice(index, 1);
        }
    };

</script>
