<template>
  <div class="p-5 text-center">
    <div class="rounded-full bg-red-200 flex items-center justify-center w-24 h-24 flex-shrink-0 mx-auto">
      <TrashIcon />
    </div>
    <div class="text-3xl mt-5 font-semibold">{{ title }}</div>
    <div class="text-gray-600 mt-2 leading-7">
      {{ message }}
    </div>
  </div>
  <div class="p-5 flex justify-center space-x-2">
    <button
      @click.prevent="onConfirm"
      class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2"
      type="button"
    >
      Ya, Saya Yakin
    </button>
    <button
      @click.prevent="onCancel"
      type="button"
      class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
    >
      Batal
    </button>
  </div>
</template>
<script>
import TrashIcon from "./trash-icon.vue";

export default {
  components: {
    TrashIcon,
  },
  props: {
    title: {
      type: String,
      default: null,
    },
    message: {
      type: String,
      default: null,
    },
    onConfirm: Function,
    onCancel: Function,
  },
};
</script>