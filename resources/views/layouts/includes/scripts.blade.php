<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof Livewire != 'undefined') {
            Livewire.on('notify', param => {
                iziToast.show({
                    color: param.color,
                    title: param.title,
                    message: param.message,
                    position: param.position,
                });
            });
        } else {
            console.warn("Livewire not loaded!");
        }
    });

</script>
