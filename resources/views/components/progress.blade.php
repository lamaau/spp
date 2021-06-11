<div id="{{ $id }}" {{$attributes->merge(['class' => 'progress'])}} data-height="5" style="height: 5px; visibility: hidden;">
    <div id="progress" class="progress-bar" role="progressbar" data-width="0%" aria-valuenow="0" aria-valuemin="0"
        aria-valuemax="{{ $max }}" style="width: 0%;"></div>
</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', () => {
            let el = document.getElementById(`{{ $id }}`);
            let pr = document.getElementById('progress');

            document.addEventListener('livewire-upload-start', (e) => {
                el.style.visibility = "visible";
            });

            document.addEventListener('livewire-upload-progress', (e) => {
                el.style.visibility = "visible";
                console.log(e.detail.progress);
                pr.style.width = `${e.detail.progress}%`;
            });

            document.addEventListener('livewire-upload-finish', (e) => {
                el.style.visibility = "hidden";
            });
        })

    </script>
@endpush
