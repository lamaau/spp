window._ = require('lodash');

import moment from 'moment';
import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('jquery.nicescroll');
    require('daterangepicker');

    window.select2 = require('select2');
    window.moment = moment;

    window.iziToast = require('izitoast');
    window.Swal = require('sweetalert2');
} catch (e) { }

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "6bcc1ffe22e24ff6bd6d",
    cluster: "ap1",
    encrypted: true,
});

