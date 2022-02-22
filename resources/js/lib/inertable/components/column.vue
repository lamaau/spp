<template>
  <tr>
    <template v-for="(column, index) in columns" :key="index">
      <th v-if="column.blank && column.checkbox" scope="col" class="p-4 cursor-pointer">
        <div class="flex items-center">
          <input :id="`checkbox-${id}`" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" />
          <label :for="`checkbox-${id}`" class="sr-only">checkbox</label>
        </div>
      </th>
      <th v-else scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" @click="$emit('onSort', column.column)">
        <div class="flex flex-row">
          <span>{{ column.text }}</span>

          <v-icon name="ChevronUpIcon" type="solid" v-if="column.sortable && params.direction == 'asc' && params.column == column.column" class="w-4 h-4 ml-2" />
          <v-icon name="ChevronDownIcon" type="solid" v-if="column.sortable && params.direction == 'desc' && params.column == column.column" class="w-4 h-4 ml-2" />
        </div>
      </th>
    </template>
  </tr>
</template>
<script>
import { v4 as uuid } from "uuid";

export default {
  props: {
    columns: Object,
    params: Object,
  },
  emits: ["onSort"],
  data: () => ({
    id: uuid(),
  }),
};
</script>