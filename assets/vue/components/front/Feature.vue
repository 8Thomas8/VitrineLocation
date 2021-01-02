<template>
  <div class="flex space-x-3">
    <svg
      class="flex-shrink-0 w-6 h-6 text-yellow-600"
      aria-hidden="true"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M17 8l4 4m0 0l-4 4m4-4H3"
      />
    </svg>
    <div class="space-y-2">
      <dt class="text-lg font-medium leading-6 text-gray-900">
        {{ title }}
      </dt>
      <dd class="flex space-x-3">
        <span class="text-base leading-6 text-gray-500">{{ desc }}</span>
      </dd>
    </div>
  </div>
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "Feature",
  props: {
    title: {
      type: String,
      default: "Titre non défini"
    },
    desc: {
      type: String,
      default: "Description non définie"
    }
  }
});
</script>
