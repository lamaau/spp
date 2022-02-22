<template>
  <v-popover class="relative" v-slot="{ open }">
    <v-popover-button>
      <slot name="button" :open="open" />
    </v-popover-button>

    <transition
      enter-active-class="transition duration-200 ease-out"
      enter-from-class="translate-y-1 opacity-0"
      enter-to-class="translate-y-0 opacity-100"
      leave-active-class="transition duration-150 ease-in"
      leave-from-class="translate-y-0 opacity-100"
      leave-to-class="translate-y-1 opacity-0"
    >
      <v-popover-panel
        :class="[position == 'right' ? 'right-0' : position == 'left' ? 'left-0' : position]"
        class="absolute right-0 min-w-[12rem] mt-2 origin-top-right py-1 bg-white dark:bg-cool-gray-600 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <slot name="content" />
      </v-popover-panel>
    </transition>
  </v-popover>
</template>
<script>
export default {
  props: {
    position: {
      type: String,
      default: "right",
    },
  },
};
</script>