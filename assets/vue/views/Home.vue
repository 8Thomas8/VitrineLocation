<template>
  <div class="relative w-full h-window">
    <img
      src="/build/images/home_bg.jpg"
      alt="Photo d'illustration"
      class="object-cover w-full h-full"
    >
    <div
      class="object-cover absolute top-0 left-0 w-full h-full bg-black opacity-25 main-title"
    />
    <div
      class="flex absolute top-0 left-0 justify-center items-center pt-16 w-full h-full"
    >
      <span
        class="text-2xl italic font-extrabold leading-10 tracking-tight text-center text-white main-title sm:text-4xl
        md:text-6xl md:leading-none"
      >
        Appartement à louer en Andalousie
      </span>

      <router-link
        class="absolute bottom-0 py-2 px-5 mb-10 text-sm font-semibold bg-white rounded-full shadow transition-all duration-500 ease-in-out animate-bounce md:text-lg hover:bg-gray-400 hover:shadow-outline hover:text-gray-800"
        to="/informations"
      >
        En savoir plus
      </router-link>
    </div>
  </div>
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "Home"
});
</script>

<style lang="scss">
.main-title {
  text-shadow: 4px 4px 2px black;
}
</style>
