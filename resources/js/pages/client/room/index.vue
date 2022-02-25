<template>
  <v-inertable :data="inertable" :actions="actions" @onAdd="onAdd" @onDownload="onDownload">
    <template #action="{ item }">
      <div class="whitespace-nowrap space-x-2">
        <button
          type="button"
          @click.prevent="onEdit(item)"
          class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
        >
          <v-icon name="PencilIcon" class="w-4 h-4" />
        </button>
        <button
          type="button"
          @click.prevent="onDestroy(item)"
          class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
        >
          <v-icon name="TrashIcon" class="w-4 h-4" />
        </button>
      </div>
    </template>
  </v-inertable>
</template>
<script>
import { h } from "vue";
import edit from "./edit.vue";
import actions from "./actions";
import create from "./create.vue";

export default {
  props: {
    inertable: Object,
  },
  data: () => ({
    actions: actions,
  }),
  methods: {
    onAdd() {
      this.$modal.open({
        slots: {
          content: () => h(create),
        },
      });
    },
    onEdit(item) {
      this.$modal.open({
        slots: {
          content: () => h(edit, { item: item }),
        },
      });
    },
    onDestroy(item) {
      this.$modal.confirm({
        title: "Apakah anda yakin?",
        message: "Kelas akan dipindahkan ke sampah",
        onConfirm: () => {
          this.$inertia.delete(`${window.location.href}/${item.id}`, {
            onSuccess: () => {
              this.$modal.close();
            },
          });
        },
      });
    },
    onDownload() {
      console.log("download");
    },
  },
};
</script>