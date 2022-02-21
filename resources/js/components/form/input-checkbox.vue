<template>
  <div class="flex h-5 items-center">
    <input :id="id" type="checkbox" class="focus:ring-3 h-4 w-4 rounded border-gray-300 bg-gray-50 focus:ring-cyan-200" />
  </div>
  <div class="ml-3 text-sm">
    <label :for="id" class="font-medium text-gray-900">
      {{ label }}
    </label>
  </div>
</template>
<script>
import { v4 as uuid } from "uuid";

export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`;
      },
    },
    type: {
      type: String,
      default: "text",
    },
    error: String,
    label: String,
    modelValue: [String, Number],
  },
  emits: ["update:modelValue"],
  methods: {
    focus() {
      this.$refs.input.focus();
    },
    select() {
      this.$refs.input.select();
    },
  },
};
</script>
