<template>
  <main>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
      <div class="mb-1 w-full">
        <div class="sm:flex">
          <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
            <Search v-model="params.search" />

            <!-- <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
              <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                </svg>
              </a>
            </div> -->
          </div>
          <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
            <template v-for="(action, index) in actions" :key="index">
              <button
                type="button"
                @click="$emit(action.emit)"
                class="
                  w-1/2
                  text-white
                  bg-cyan-600
                  hover:bg-cyan-700
                  focus:ring-4 focus:ring-cyan-200
                  font-medium
                  inline-flex
                  items-center
                  justify-center
                  rounded-lg
                  text-sm
                  px-3
                  py-2
                  text-center
                  sm:w-auto
                "
              >
                <v-icon :name="action.icon" type="outline" class="-ml-1 h-6 w-6" />
                {{ action.text }}
              </button>
            </template>
            <!-- <a
              href="#"
              class="
                w-1/2
                text-gray-900
                bg-white
                border border-gray-300
                hover:bg-gray-100
                focus:ring-4 focus:ring-cyan-200
                font-medium
                inline-flex
                items-center
                justify-center
                rounded-lg
                text-sm
                px-3
                py-2
                text-center
                sm:w-auto
              "
            >
              <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              Export
            </a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
          <div class="shadow overflow-hidden">
            <table class="table-fixed min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-100">
                <Column :columns="data.columns" :params="params" @onSort="handleSort" />
              </thead>
              <tbody class="bg-white divide-y divide-gray-200" v-if="data.data.data.length">
                <Row :columns="data.columns" :data="data.data" />
              </tbody>
              <tbody class="bg-white divide-y divide-gray-200" v-else>
                <tr>
                  <td class="text-center p-4" :colspan="data.columns.length">Kosong</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <Pagination :total="data.data.total" :last="data.data.last_page" :current="data.data.current_page" :from="data.data.from" :to="data.data.to" @loadPage="handleOnLoadPage" />
  </main>
</template>
<script>
import { pickBy, throttle } from "lodash";
import Row from "./components/row.vue";
import Column from "./components/column.vue";
import Search from "./components/search.vue";
import Pagination from "./components/pagination.vue";

export default {
  components: {
    Row,
    Column,
    Search,
    Pagination,
  },
  props: {
    data: Object,
    actions: [Array, Object],
  },
  data() {
    const { filters } = this.data;

    return {
      filters: filters,
      params: {
        column: filters.column,
        direction: filters.direction,
        search: filters.search,
        perpage: filters.perpage ?? 15,
        page: this.data.current_page,
      },
    };
  },
  methods: {
    handleSort(column) {
      if (!this.filters) return;

      this.params.column = column;
      this.params.direction = this.params.direction === "asc" ? "desc" : "asc";
    },
    handleOnLoadPage(page) {
      this.params.page = page;
    },
  },
  watch: {
    params: {
      handler: throttle(function () {
        let params = pickBy(this.params);

        this.$inertia.get(`${window.location.pathname}`, params, {
          replace: true,
          preserveState: true,
        });
      }, 100),
      deep: true,
    },
  },
};
</script>