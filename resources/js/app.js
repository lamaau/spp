const axios = require("axios");

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios = axios.create({
        baseURL: "http://goenge.wip/api/v1/",
        timeout: 1000,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token.content,
        },
    });
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

/**
 * Input number add comma when typing
 */
var el = document.querySelector("input.number");
if (el) {
    el.addEventListener("keyup", function (event) {
        if (event.which >= 37 && event.which <= 40) return;

        this.value = this.value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
}

/**
 * Bootstraping file
 */
require("./bootstrap");

/**
 * Helper
 */
require("./helper");
