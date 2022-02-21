<template>
  <aside id="sidebar" class="transition-width fixed top-0 left-0 z-20 hidden h-full w-64 flex-shrink-0 flex-col pt-16 duration-75 lg:flex" aria-label="Sidebar">
    <div class="relative flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-white pt-0">
      <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
        <div class="flex-1 space-y-1 divide-y bg-white px-3">
          <ul class="space-y-2 py-2" v-for="(nav, index) in navigators" :key="index">
            <li v-for="(item, index) in nav.subItems" :key="index">
              <v-app-link :href="item.url" class="group flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100">
                <v-icon :name="item.heroicon" class="h-6 w-6 text-gray-500" />
                <span class="ml-3 flex-1 whitespace-nowrap">{{ item.name }}</span>
              </v-app-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
</template>
<script setup>
const props = defineProps({
  navigators: [Array, String],
});

const navigators = JSON.parse(props.navigators);
</script>
