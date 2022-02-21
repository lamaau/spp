<template>
  <div :class="$attrs.class">
    <label v-if="label" class="mb-2 block text-sm font-medium text-gray-900" :for="id">{{ label }}</label>
    <input
      :id="id"
      ref="input"
      :type="type"
      :value="modelValue"
      v-bind="{ ...$attrs, class: null }"
      :class="{ 'border border-red-500': error }"
      @input="$emit('update:modelValue', $event.target.value)"
      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
    />
    <div v-if="error" class="mt-1 text-sm text-red-500">{{ error }}</div>
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
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end);
    },
  },
};
</script>
