// inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

// headlessui
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";

// inertable
import Inertable from "~/lib/inertable/inertable";

// common
import Icon from "~/components/common/icon.vue";
import Dropdown from "~/components/common/dropdown.vue";

// layout
import Navbar from "~/components/layouts/navbar.vue";
import Sidebar from "~/components/layouts/sidebar.vue";
import Footer from "~/components/layouts/footer.vue";
import StatsCard from "~/components/layouts/stats-card.vue";

// form
import InputText from "~/components/form/input-text.vue";
import InputNumber from "~/components/form/input-number.vue";
import InputSelect from "~/components/form/input-select.vue";
import InputTextarea from "~/components/form/input-textarea.vue";
import InputCheckbox from "~/components/form/input-checkbox.vue";
import ButtonLoading from "~/components/form/button-loading.vue";

export default {
  install: (app, options) => {
    // inertia
    app.component("v-app-head", Head);
    app.component("v-app-link", Link);

    // inertable
    app.component("v-inertable", Inertable);

    // common
    app.component("v-icon", Icon);
    app.component("v-dropdown", Dropdown);
    app.component("v-stats-card", StatsCard);

    // headlessui
    app.component("v-popover", Popover);
    app.component("v-popover-panel", PopoverPanel);
    app.component("v-popover-button", PopoverButton);

    // form
    app.component("v-input-text", InputText);
    app.component("v-input-number", InputNumber);
    app.component("v-input-select", InputSelect);
    app.component("v-input-textarea", InputTextarea);
    app.component("v-input-checkbox", InputCheckbox);
    app.component("v-button-loading", ButtonLoading);

    // layout
    app.component("v-navbar", Navbar);
    app.component("v-sidebar", Sidebar);
    app.component("v-footer", Footer);
  },
};
