<template>
  <v-inertable :data="inertable" />
</template>
<script>
export default {
  props: {
    inertable: Object,
  },
};
</script>