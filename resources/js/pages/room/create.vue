<template>
  <div class="p-6 space-y-6">
    <form action="#" class="flex flex-col space-y-4">
      <v-input-text v-model="form.name" label="Nama Kelas" :error="form.errors.name" />
      <v-input-textarea v-model="form.description" label="Keterangan" :error="form.errors.description" />

      <div class="flex-none ml-auto">
        <v-button-loading @click.prevent="handleSubmit" type="button" :loading="form.processing" text="Simpan" />
      </div>
    </form>
  </div>
</template>
<script>
import { school } from "~/plugins/helper";
import { defineComponent } from "vue";
import { useDialog } from "~/lib/modal";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
  setup() {
    const dialog = useDialog();

    const form = useForm({
      name: null,
      description: null,
    });

    const handleSubmit = () => {
      form.post(window.location.href, {
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