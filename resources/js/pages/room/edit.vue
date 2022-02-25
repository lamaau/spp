<template>
  <div class="p-6 space-y-6">
    <form action="#" class="flex flex-col space-y-4">
      <v-input-text v-model="form.name" label="Nama Kelas" :error="form.errors.name" />
      <v-input-textarea v-model="form.description" label="Keterangan" :error="form.errors.description" />

      <div class="flex-none ml-auto">
        <v-button-loading @click.prevent="handleSubmit" type="button" :loading="form.processing" text="Ubah" />
      </div>
    </form>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { useDialog } from "~/lib/modal";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
  setup(__, { attrs }) {
    const { id, name, description } = attrs.item;

    const dialog = useDialog();

    const form = useForm({
      name: name,
      description: description,
    });

    console.log(id);

    const handleSubmit = () => {
      form.put(`${window.location.pathname}/${id}`, {
        onSuccess: () => {
          dialog.close();
        },
      });
    };

    return {
      form,
      handleSubmit,
    };
  },
});
</script>