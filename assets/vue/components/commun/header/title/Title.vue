<template>
  <div class="flex items-center flex-shrink-0 ml-2">
    <img
      class="w-auto h-8"
      src="/build/images/logo.svg"
      alt="Logo du site"
    >
    <span
      class="ml-2 text-xl font-extrabold tracking-tight text-white md:text-3xl"
    >Titre du site</span>
  </div>
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "AppTitle"
});
</script>
