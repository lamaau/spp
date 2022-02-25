<template>
  <tr v-for="(item, index) in data.data" :key="index" class="hover:bg-gray-100">
    <template v-for="(column, i) in columns" :key="i">
      <td v-if="column.blank && column.checkbox" class="p-4 w-4">
        <div class="flex items-center">
          <input :id="`checkbox-${id}`" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" />
          <label :for="`checkbox-${id}`" class="sr-only">checkbox</label>
        </div>
      </td>
      <td v-else class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
        <template>
          dwdw
          <slot :name="column.column" :item="item" />
        </template>

        <div v-if="!$slots[column.column]">
          {{ item[column.column] }}
        </div>
      </td>
    </template>
  </tr>
</template>
<script>
import { v4 as uuid } from "uuid";

export default {
  props: {
    data: Object,
    columns: Object,
  },
  data() {
    return {
      id: uuid(),
    };
  },
};
</script>