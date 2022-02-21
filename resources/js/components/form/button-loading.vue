<template>
  <button
    :disabled="loading"
    class="flex w-full items-center rounded-lg bg-cyan-600 px-5 py-2 text-center text-base font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 disabled:bg-opacity-50 sm:w-auto"
  >
    <span v-if="loading" class="mr-3 h-4 w-4">
      <svg class="-ml-1 mr-3 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
    </span>
    <span v-if="!loading">{{ text }}</span>
    <span v-else>Loading..</span>
  </button>
</template>

<script setup>
const props = defineProps({
  text: String,
  loading: Boolean,
});
</script>
