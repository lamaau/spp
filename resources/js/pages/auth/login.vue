<template>
  <form class="mt-8 space-y-6">
    <div>
      <v-input-text type="email" label="Alamat email" v-model="form.email" :error="form.errors.email" />
    </div>
    <div>
      <v-input-text type="password" label="Password" v-model="form.password" :error="form.errors.password" />
    </div>
    <div class="flex items-start">
      <v-input-checkbox label="Ingat saya" />

      <a href="#" class="text-sm text-teal-500 hover:underline ml-auto">Lupa Password?</a>
    </div>
    <v-button-loading :loading="form.processing" @click.prevent="handleFormSubmit" type="button" text="Login ke akun anda" />
    <div class="text-sm font-medium text-gray-500">Tidak terdaftar? <v-app-link href="/auth/register" class="text-teal-500 hover:underline">Daftar disini</v-app-link></div>
  </form>
</template>
<script>
import { defineComponent } from "vue";
import AuthLayout from "~/layouts/auth.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
  layout: AuthLayout,
  setup() {
    const form = useForm({
      email: "admin@domain.com",
      password: "secret",
    });

    const handleFormSubmit = () => {
      form.post("/auth/login", {
        onSuccess: () => {
          console.log("dwdw");
        },
      });
    };

    return {
      form,
      handleFormSubmit,
    };
  },
});
</script>