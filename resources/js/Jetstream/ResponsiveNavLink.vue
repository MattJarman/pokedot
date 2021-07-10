<template>
  <div>
    <button :class="classes" class="w-full text-left" v-if="as == 'button'">
      <slot></slot>
    </button>

    <inertia-link :href="href" :class="classes" v-else>
      <slot></slot>
    </inertia-link>
  </div>
</template>

<script>
export default {
  props: ["active", "href", "as"],

  computed: {
    classes() {
      return this.active
        ? "block -m-3 p-3 rounded-md text-gray-900 text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 transition"
        : "block -m-3 p-3 rounded-md hover:bg-gray-50 text-gray-900 focus:bg-gray-50 transition";
    },
  },
};
</script>
