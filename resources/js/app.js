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
 * Bootstraping file
 */
require("./bootstrap");

/**
 * Helper
 */
require("./helper");
