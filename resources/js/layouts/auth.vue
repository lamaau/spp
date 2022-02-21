<template>
  <v-app-head :title="title" />
  <div class="bg-gray-50">
    <div class="pt:mt-0 mx-auto flex flex-col items-center justify-center px-6 pt-8 md:h-screen">
      <a href="#" class="mb-8 flex items-center justify-center text-2xl font-semibold lg:mb-10">
        <img src="/img/logo.svg" class="mr-4 h-10" alt="Windster Logo" />
        <span class="self-center whitespace-nowrap text-2xl font-bold">SPP</span>
      </a>

      <div class="w-full rounded-lg border bg-white shadow sm:max-w-screen-sm md:mt-0 xl:p-0">
        <div class="space-y-8 p-6 sm:p-8 lg:p-16">
          <h2 class="text-2xl font-bold text-gray-900 lg:text-3xl">{{ title }}</h2>
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
