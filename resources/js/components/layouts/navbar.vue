<template>
  <nav class="fixed z-30 w-full border-b border-gray-200 bg-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button
            id="toggleSidebarMobile"
            aria-expanded="true"
            aria-controls="sidebar"
            class="mr-2 cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 lg:hidden"
          >
            <svg id="toggleSidebarMobileHamburger" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <svg id="toggleSidebarMobileClose" class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <select v-model="form.company_id">
            <option v-for="(company, index) in companies" :key="index" :value="company.id">{{ company.name }}</option>
          </select>
          <form action="#" method="GET" class="hidden lg:block lg:pl-32">
            <label for="topbar-search" class="sr-only">Search</label>
            <div class="relative mt-1 lg:w-64">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input
                type="text"
                name="email"
                id="topbar-search"
                autocomplete="off"
                placeholder="Search"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-gray-900 focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
              />
            </div>
          </form>
        </div>
        <div class="flex items-center">
          <button id="toggleSidebarMobileSearch" type="button" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 lg:hidden">
            <span class="sr-only">Search</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <div class="flex flex-row space-x-2">
            <v-popover class="relative">
              <v-popover-button
                class="ml-5 mr-3 hidden items-center rounded-lg bg-cyan-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 sm:inline-flex"
              >
                Button
              </v-popover-button>

              <transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="translate-y-1 opacity-0"
                enter-to-class="translate-y-0 opacity-100"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="translate-y-0 opacity-100"
                leave-to-class="translate-y-1 opacity-0"
              >
                <v-popover-panel
                  class="dark:bg-cool-gray-600 absolute right-0 mt-2 min-w-[12rem] origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                  <div class="flex flex-col space-y-2 p-3">
                    <div class="flex flex-col space-y-2">
                      <span>{{ user.name }}</span>
                      <span></span>
                    </div>
                    <v-app-link href="/auth/logout" method="delete" as="button">Keluar</v-app-link>
                  </div>
                </v-popover-panel>
              </transition>
            </v-popover>

            <a
              href="#"
              class="ml-5 mr-3 hidden items-center rounded-lg bg-cyan-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 sm:inline-flex"
            >
              <svg
                class="svg-inline--fa fa-gem -ml-1 mr-2 h-4 w-4"
                aria-hidden="true"
                focusable="false"
                data-prefix="fas"
                data-icon="gem"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
              >
                <path
                  fill="currentColor"
                  d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"
                ></path>
              </svg>
              Upgrade to Pro
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
import { defineComponent, watch } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
  setup(__, { attrs }) {
    const { user, companies } = attrs;

    const form = useForm({
      company_id: null,
    });

    watch(form, (value) => {
      console.log(value);
    });

    return {
      form,
      user,
      companies,
    };
  },
});
</script>
