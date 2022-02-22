import { useDialog } from "./api";
import DialogComponent from "./components/dialog.vue";

const Dialog = {
  install(app, options = {}) {
    let instance = useDialog(app, options);

    app.config.globalProperties.$modal = instance;
    app.provide("$modal", instance);
  },
};

export default Dialog;
export { useDialog, Dialog, DialogComponent };
