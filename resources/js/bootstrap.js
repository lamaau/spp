window._ = require('lodash');

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "6bcc1ffe22e24ff6bd6d",
    cluster: "ap1",
    encrypted: true,
});
