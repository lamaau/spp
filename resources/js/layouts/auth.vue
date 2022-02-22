<template>
  <v-app-head :title="title" />
  <div class="bg-gray-50">
    <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
      <a href="#" class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
        <!-- <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-10 mr-4" alt="Windster Logo" /> -->
        <span class="self-center text-2xl font-bold whitespace-nowrap">Akunting</span>
      </a>

      <div class="bg-white border shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
        <div class="p-6 sm:p-8 lg:p-16 space-y-8">
          <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ title }}</h2>
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  title: String,
});
</script>