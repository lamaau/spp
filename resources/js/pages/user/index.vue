<template>
  <v-inertable :data="inertable" :actions="actions" @onAdd="onAdd" @onDownload="onDownload" />
</template>
<script>
import { h } from "vue";
import actions from "./actions";
import create from "./create.vue";

export default {
  props: {
    inertable: Object,
  },
  data() {
    return {
      actions: actions,
    };
  },
  methods: {
    onAdd() {
      this.$modal.open({
        slots: {
          content: () => h(create),
        },
      });
    },
    onDownload() {
      console.log("download");
    },
  },
};
</script>