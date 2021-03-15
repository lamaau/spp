<div x-data="notification" x-init="init()">
    <div x-on:notif.window="listenNotif(event)">
        <div x-show="open" class="absolute top-0 right-0 w-2/3 m-3 md:w-1/3"
            x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition transform ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
            style="display: none;">
            <div class="flex items-start p-3 space-x-2 bg-white border border-gray-300 rounded-md shadow-lg">
                <x-icons.circle-check class="w-6 text-green-400" x-show="type === 'success'" />
                <x-icons.circle-x class="w-6 text-red-400" x-show="type === 'error'" />
                <div class="flex-1 space-y-1">
                    <p class="text-base font-medium leading-6 text-gray-700">
                        <span x-text="title"></span>
                    </p>
                    <p class="text-sm leading-5 text-gray-600">
                        <span x-text="message"></span>
                    </p>
                </div>
                <svg class="flex-shrink-0 w-5 h-5 text-gray-400 cursor-pointer" x-on:click="open = false"
                    stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1.2"
                        d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const notification = {
        open: false,
        type: null,
        title: null,
        message: null,
        init: function() {
            this.$watch("open", (val) => {
                if (val) {
                    setInterval(() => {
                        this.open = false;
                    }, 5000);
                }
            });
        },
        listenNotif: function(event) {
            const {
                type,
                title,
                message
            } = event.data;

            this.open = true;
            this.type = type;
            this.title = title;
            this.message = message;
        }
    };

</script>
