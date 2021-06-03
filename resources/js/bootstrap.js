window._ = require('lodash');

import Echo from "laravel-echo";
import Swal from 'sweetalert2'

window.Pusher = require("pusher-js");
window.Swal = require("sweetalert2");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "6bcc1ffe22e24ff6bd6d",
    cluster: "ap1",
    encrypted: true,
});


window.CustomDeleteSwall = ({ title, message }, callable = null) => Swal.fire({
    title: title,
    text: message,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#394eea',
    cancelButtonColor: '#bfc6cd',
    confirmButtonText: 'Ya, saya yakin',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            title: 'Konfirmasi Password',
            input: 'password',
            icon: 'warning',
            inputPlaceholder: 'Masukan password',
            showCancelButton: true,
            confirmButtonColor: '#394eea',
            cancelButtonColor: '#bfc6cd',
            cancelButtonText: 'Batal',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off',
                required: true,
            }
        })
            .then((result) => {
                if (result.isConfirmed) {
                    if (callable) {
                        callable(result);
                    }
                }
            })
    }
});