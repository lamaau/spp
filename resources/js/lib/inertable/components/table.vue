<template>
  <table class="min-w-full table-fixed divide-y divide-gray-200">
    <thead class="bg-gray-100">
      <tr>
        <Column />
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
      <Row />
    </tbody>
  </table>
</template>
<script>
import Row from "./row.vue";
import Column from "./column.vue";
import { defineComponent } from "vue";

export default defineComponent({
  setup() {
    //
  },
  components: {
    Row,
    Column,
  },
});
</script>
