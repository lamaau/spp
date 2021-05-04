<!-- General JS Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>

{{-- JS Library --}}
<script src="https://demo.getstisla.com/assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/izitoast/js/iziToast.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/select2/dist/js/select2.full.min.js"></script>

<script src="https://demo.getstisla.com/assets/js/scripts.js"></script>

{{-- Livewire --}}
{!! Livewire::scripts() !!}

@stack('scripts')

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
            console.info("Livewire not loaded!");
        }
    });

</script>

@if (session()->has('notify'))
    @php
        $values = session()->get('notify');
    @endphp
    @if (is_array($values))
        <script type="text/javascript">
            @foreach ($values as $value)
                iziToast.show({
                color: "{{ $value['color'] }}",
                title: "{{ $value['title'] }}",
                message: "{{ $value['message'] }}",
                position: "{{ $value['position'] }}",
                });
            @endforeach

        </script>
    @endif
    @php
        session()->forget('notify');
    @endphp
@endif
