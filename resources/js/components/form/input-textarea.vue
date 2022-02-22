<template>
  <div :class="$attrs.class">
    <label v-if="label" class="text-sm font-medium text-gray-900 block mb-2" :for="id">{{ label }}</label>
    <textarea
      :id="id"
      ref="textarea"
      :value="modelValue"
      :class="{ error: error }"
      v-bind="{ ...$attrs, class: null }"
      @input="$emit('update:modelValue', $event.target.value)"
      class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
    />
    <div v-if="error" class="form-error">{{ error }}</div>
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
    error: String,
    label: String,
    modelValue: String,
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
