<template>
  <div class="relative text-gray-600 dark:text-cool-gray-500 focus-within:text-gray-400">
    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
      <button type="button" class="p-1 focus:outline-none focus:shadow-outline">
        <v-icon name="SearchIcon" type="outline" class="w-5 h-5" />
      </button>
    </span>
    <input
      name="q"
      type="search"
      autocomplete="off"
      aria-label="search"
      v-model="modelValue"
      placeholder="Cari..."
      @input="$emit('update:modelValue', $event.target.value)"
      class="
        py-2
        pl-10
        border
        rounded-md
        focus:ring-0
        outline-none
        appearance-none
        border-gray-300
        text-sm text-gray-800
        focus:border-purple-500
        dark:text-cool-gray-300 dark:placeholder:text-cool-gray-400 dark:bg-cool-gray-700 dark:border-cool-gray-500
      "
    />
  </div>
</template>
<script>
export default {
  props: {
    modelValue: String,
  },
  emits: ["update:modelValue"],
};
</script>