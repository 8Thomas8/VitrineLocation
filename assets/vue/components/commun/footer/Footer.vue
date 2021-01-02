<template>
  <div class="py-4 px-4 h-12 text-white bg-gray-900 text-md sm:px-6 lg:px-8">
    <div class="flex flex-col justify-evenly items-center -mt-1 sm:flex-row">
      <span>2020 © Nom du site</span>
      <span>Réalisé par
        <a
          href="https://github.com/8Thomas8"
          title="Lien GitHub"
          class="text-blue-200"
        >T. Rousseau</a></span>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  name: "Footer"
});
</script>
