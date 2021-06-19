@push('styles')
    <style>
        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            width: 320px;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
                -ms-transform: translate3d(0%, 0, 0);
                -o-transform: translate3d(0%, 0, 0);
                    transform: translate3d(0%, 0, 0);
        }

        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
        }

        .modal.right.fade .modal-dialog {
            right: 0px;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-in;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-in;
                -o-transition: opacity 0.3s linear, right 0.3s ease-in;
                    transition: opacity 0.3s linear, right 0.3s ease-in;
        }
        
        .modal.right.fade.in .modal-dialog {
            right: 0px;
        }

        .modal-content {
            border-radius: 0;
            border: none;
        }

        .modal-header {
            padding: 1rem;
            border-bottom-color: #eeeeee;
            background-color: #fafafa;
        }

        .btn-export {
            z-index: 10;
            top: 9.2rem;
            right: 0;
            position: fixed;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0;
        }
    </style>
@endpush

<div class="modal right fade" id="download" tabindex="-1" role="dialog" aria-labelledby="modalLabel" {{$attributes}}>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Download Excel</h4>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>