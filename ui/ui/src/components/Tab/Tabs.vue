<template>
  <ul class="tabs__header tabs__light">
    <li
        v-for="(tab, i) of tabs"
        :key="i"
        :class="
                active === i
                    ? 'tab__selected'
                    : 'border-b-2 border-white text-gray-500'
            "
        @click="selectTab(i)"
    >
      {{ tab.props.title }}
    </li>
  </ul>
  <div class="tab">
    <slot />
  </div>
</template>

<script>
import {computed , provide , ref } from "vue";

export default {
  name: "Tabs",
  props: {
    modelValue: {
      type: [String, Number],
    },
  },
  emits: ["update:modelValue"],
  setup(props, { emit }) {
    const active = computed(() => props.modelValue);
    const tabs = ref([]);

    function selectTab(tab) {
      emit("update:modelValue", tab);
    }

    provide("tabsState", {
      active,
      tabs,
    });

    return {
      tabs,
      active,
      selectTab,
    };
  },
}
</script>

<style scoped>
ul.tabs__header {
  display: flex;
  align-items: stretch;
  list-style: none;
  margin: 0;
  padding: 0;
}

ul.tabs__header > li {
  padding: 15px 0;
  display: inline-flex;
  margin: 0;
  cursor: pointer;
  text-align: center;
  flex: 1;
}

ul.tabs__header > li.tab__selected {
  border-bottom: 5px solid var(--white);
  color: var(--white);
}

.tabs__light li {
  color: #aaa;
  border-bottom: 5px solid var(--grey);
}

.tab {
  display: inline-block;
  color: var(--white);
  padding: 20px;
  min-height: 400px;
}

</style>