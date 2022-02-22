import { createApp, h } from "vue";
import { globalComponent } from "~/plugins";
import AppLayout from "./layouts/default.vue";
import { InertiaProgress } from "@inertiajs/progress";
import { createInertiaApp } from "@inertiajs/inertia-vue3";

// toast notification
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

import AppDialog from "~/lib/modal";

InertiaProgress.init({
  showSpinner: true,
});

const exceptPages = ["auth/login"];

createInertiaApp({
  resolve: (name) => {
    const page = require(`./pages/${name}.vue`).default;

    if (page.layout == undefined && !exceptPages.includes(name)) {
      page.layout = AppLayout;
    }

    return page;
  },
  title: (title) => `${title} - SPP`,
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.config.productionTip = false;

    app.use(plugin);

    app.use(AppDialog);

    app.use(globalComponent);

    app.use(VueToast, {
      position: "top-right",
    });

    app.mount(el);
    return app;
  },
});
