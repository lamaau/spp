<template>
  <table class="table-fixed min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-100">
      <Column :columns="data.columns" :filters="data.filters" />
    </thead>
    <tbody class="bg-white divide-y divide-gray-200" v-if="data.data.data.length">
      <Row :columns="data.columns" :data="data.data">
        <slot />
      </Row>
    </tbody>
    <tbody class="bg-white divide-y divide-gray-200" v-else>
      <tr>
        <td class="text-center p-4" :colspan="data.columns.length">Kosong</td>
      </tr>
    </tbody>
  </table>
</template>
<script>
import Row from "./row.vue";
import Column from "./column.vue";

export default {
  components: {
    Row,
    Column,
  },
  props: {
    data: Object,
  },
};
</script>