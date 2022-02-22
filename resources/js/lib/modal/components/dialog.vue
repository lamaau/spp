<template>
  <TransitionRoot appear :show="state" as="template">
    <Dialog as="div" @close="close">
      <div class="fixed inset-0 z-10 overflow-y-auto transition duration-100 backdrop-blur-sm bg-white/30">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100" leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>

          <span class="inline-block h-screen align-middle" aria-hidden="true"> &#8203; </span>

          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <div class="inline-block w-full max-w-md my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-cool-gray-800 shadow-xl rounded-lg border border-gray-200">
              <slot name="content" v-if="$slots['content']" />
              <div v-else>
                <div class="p-5 text-center">
                  <div class="rounded-full bg-red-200 flex items-center justify-center w-24 h-24 flex-shrink-0 mx-auto">
                    <TrashIcon />
                  </div>
                  <div class="text-3xl mt-5 font-semibold">{{ title }}</div>
                  <div class="text-gray-600 mt-2 leading-7">
                    {{ message }}
                  </div>
                </div>
                <div class="p-5 flex justify-center space-x-2 mt-4">
                  <button @click.prevent="onCancel" type="button" class="btn-close">Tutup</button>
                  <button @click.prevent="onConfirm" class="btn-red" type="button">Hapus</button>
                </div>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { eventBus } from "~/plugins";
import TrashIcon from "./trash-icon.vue";
import { reactive, ref, toRefs } from "vue";
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle } from "@headlessui/vue";

export default {
  components: {
    Dialog,
    TrashIcon,
    DialogTitle,
    DialogOverlay,
    TransitionRoot,
    TransitionChild,
  },
  setup() {
    const state = ref(false);

    const confirmOption = reactive({
      title: null,
      message: null,
      onConfirm: Function,
      onCancel: Function,
    });

    const open = (options) => {
      state.value = true;
    };

    const close = () => {
      state.value = false;
    };

    const confirm = (options) => {
      const { title, message, onConfirm, onCancel } = options;

      confirmOption.title = title === undefined ? "Apakah anda yakin?" : title;
      confirmOption.message = message;
      confirmOption.onConfirm = onConfirm;
      confirmOption.onCancel = onCancel === undefined ? close : onCancel;

      state.value = true;
    };

    eventBus.on("close-dialog", close);

    return {
      state,
      open,
      close,
      confirm,
      ...toRefs(confirmOption),
    };
  },
};
</script>