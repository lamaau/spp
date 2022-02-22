<template>
  <tr>
    <template v-for="(column, index) in columns" :key="index">
      <th v-if="column.blank && column.checkbox" scope="col" class="p-4 cursor-pointer">
        <div class="flex items-center">
          <input :id="`checkbox-${id}`" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" />
          <label :for="`checkbox-${id}`" class="sr-only">checkbox</label>
        </div>
      </th>
      <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" @click="handleSort(column.column)">
        <div class="flex flex-row">
          <span>{{ column.text }}</span>
          <v-icon name="ChevronUpIcon" type="solid" v-if="filters && column.sortable && params.direction == 'asc' && params.column == column.column" class="w-4 h-4 ml-2" />
          <v-icon name="ChevronDownIcon" type="solid" v-if="filters && column.sortable && params.direction == 'desc' && params.column == column.column" class="w-4 h-4 ml-2" />
        </div>
      </th>
    </template>
  </tr>
</template>
<script>
import { v4 as uuid } from "uuid";
import { pickBy, throttle } from "lodash";

export default {
  props: {
    columns: Object,
    filters: Object,
  },
  data() {
    return {
      id: uuid(),
      params: {
        column: this.filters?.column,
        search: this.filters?.search,
        direction: this.filters?.direction,
        perpage: this.filters?.perpage ?? 15,
      },
    };
  },
  methods: {
    handleSort(column) {
      if (!this.filters) return;

      this.params.column = column;
      this.params.direction = this.params.direction === "asc" ? "desc" : "asc";
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