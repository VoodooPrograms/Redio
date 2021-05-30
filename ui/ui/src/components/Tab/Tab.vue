<template>
  <div v-show='isActive'>
    <slot></slot>
  </div>
</template>

<script>
import {watchEffect, inject, getCurrentInstance, computed} from "vue";

export default {
  name: "Tab",
  props: {
    title: String,
  },
  setup() {
    const instance = getCurrentInstance();
    const { tabs, active } = inject("tabsState");

    const index = computed(() =>
        tabs.value.findIndex((target) => target.uid === instance.uid)
    );
    const isActive = computed(() => index.value === active.value);

    watchEffect(() => {
      if (index.value === -1) {
        tabs.value.push(instance);
      }
    });

    return {
      isActive,
    };
  },
}
</script>

<style scoped>

</style>