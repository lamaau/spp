<template>
  <button
    :disabled="loading"
    class="flex items-center disabled:bg-opacity-50 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-2 w-full sm:w-auto text-center"
  >
    <span v-if="loading" class="w-4 h-4 mr-3">
      <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
