import { useDialog } from "./api";
import ModalComponent from "./components/modal.vue";

const Dialog = {
  install(app, options = {}) {
    let instance = useDialog(app, options);

    app.config.globalProperties.$modal = instance;
    app.provide("$modal", instance);
  },
};

export default Dialog;
export { useDialog, Dialog, ModalComponent };
