<template>
  <div class="fixed top-0 left-0 z-50 w-full h-full">
    <div class="absolute z-20 w-full h-full bg-black opacity-75 tra" />
    <div class="absolute z-40 py-10 m-auto w-2/3 w-full h-full rounded-md">
      <img
        :src="`/build/images/` + modalPhoto.src"
        :title="modalPhoto.title"
        :alt="modalPhoto.title"
        class="object-contain w-full h-full"
      >
      <a
        href=""
        title="Fermer l'aperçu"
        class="absolute top-0 right-0 mt-6 mr-12 text-white bg-black rounded-full animate-pulse"
      ><svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        class="w-10 h-10 cursor-pointer"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
        /></svg></a>
    </div>
  </div>
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "ModalPhoto",
  props: {
    modalPhoto: {
      type: Object,
      default() {
        return {}
      }
    },
  }
});
</script>
