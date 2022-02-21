<template>
  <div>
    <component :is="component"></component>
  </div>
</template>
<script setup>
import { ref } from "vue";

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: () => "solid",
  },
});

const component = ref(null);

if (props.type === "outline") {
  let outline = require("@heroicons/vue/outline");
  component.value = outline[props.name];
} else {
  let solid = require("@heroicons/vue/solid");
  component.value = solid[props.name];
}
</script>
