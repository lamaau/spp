<template>
  <div>
    <v-app-head :title="title" />

    <v-navbar :user="app.auth" />

    <div class="flex overflow-hidden bg-white pt-16">
      <v-sidebar :navigators="app.navigators" :schools="app.schools" />

      <!-- sidebar backdrop -->
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <slot />

        <v-footer />
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  app: Object,
  title: String,
});
</script>