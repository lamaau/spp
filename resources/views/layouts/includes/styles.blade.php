{{-- Livewire --}}
{!! Livewire::styles() !!}

<!-- General CSS Files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />

{{-- CSS Library --}}
<link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/izitoast/css/iziToast.min.css">
<link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/select2/dist/css/select2.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

<style type="text/css">
    /* custom for select2 */
    .custom-select-icon .select2-selection__arrow>b {
        display: none;
    }

    .custom-select-icon .select2-selection__arrow {
        background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
    }

    .has-error .select2-selection {
        border-color: #dc3545 !important;
    }

    .is-invalid-select2+.select2 .select2-selection {
        border-color: #dc3545 !important;
    }

</style>

@stack('styles')
