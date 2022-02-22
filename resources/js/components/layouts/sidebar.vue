<template>
  <aside id="sidebar" class="fixed hidden z-auto h-full top-0 left-0 pt-16 lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
      <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 bg-white divide-y space-y-1">
          <ul class="space-y-2 py-2" v-for="(nav, index) in navigators" :key="index">
            <li v-for="(item, index) in nav.subItems" :key="index">
              <v-app-link :href="item.url" :class="{ 'bg-gray-100': isUrl(item.url.slice(1)) }" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group">
                <v-icon :name="item.heroicon" class="w-6 h-6 text-gray-500" />
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
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage();

const props = defineProps({
  navigators: [Array, String],
});

const navigators = JSON.parse(props.navigators);

const isUrl = (...urls) => {
  let currentUrl = page.url.value.substr(1);
  if (urls[0] === "") {
    return currentUrl === "";
  }

  return urls.filter((url) => currentUrl.startsWith(url)).length;
};
</script>