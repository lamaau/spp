<template>
  <div class="p-6 space-y-6 w-full">
    <form action="#">
      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3">
          <v-input-text label="Nama" v-model="form.name" :error="form.errors.name" />
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-text label="Nis" v-model="form.nis" :error="form.errors.nis" />
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-text label="Nisn" v-model="form.nisn" :error="form.errors.nisn" />
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-text label="Email" v-model="form.email" :error="form.errors.email" />
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-text label="Nomor HP" v-model="form.phone" :error="form.errors.phone" />
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-select v-model="form.gender" label="Jenis Kelamin" :error="form.errors.gender">
            <option v-for="(gender, value) in genders" :key="value" :value="value">{{ gender }}</option>
          </v-input-select>
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-select v-model="form.religion" label="Agama" :error="form.errors.religion">
            <option v-for="(religion, value) in religions" :key="value" :value="value">{{ religion }}</option>
          </v-input-select>
        </div>
        <div class="col-span-6 sm:col-span-3">
          <v-input-select v-model="form.room" label="Kelas" :error="form.errors.room">
            <option v-for="(room, index) in rooms" :key="index" :value="room.id">{{ room.name }}</option>
          </v-input-select>
        </div>
      </div>
      <div class="mt-4 flex justify-end">
        <v-button-loading @click.prevent="handleSubmit" type="button" :loading="form.processing" text="Simpan" />
      </div>
    </form>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { useDialog } from "~/lib/modal";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
  setup(__, { attrs }) {
    const dialog = useDialog();
    const { rooms, genders, religions } = attrs;

    const form = useForm({
      name: null,
      room: null,
      nis: null,
      nisn: null,
      email: null,
      phone: null,
      religion: null,
      gender: null,
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
      rooms,
      genders,
      religions,
      handleSubmit,
    };
  },
});
</script>