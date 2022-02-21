<template>
  <div>
    <v-app-head :title="title" />

    <!-- <v-navbar :user="app.auth" :companies="app.companies" /> -->

    <div class="flex overflow-hidden bg-white pt-16">
      <!-- <v-sidebar :navigators="app.navigators" /> -->

      <!-- sidebar backdrop -->
      <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>

      <div id="main-content" class="relative h-full w-full overflow-y-auto bg-gray-50 lg:ml-64">
        <slot />
        <v-footer />
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  title: String,
});
</script>
