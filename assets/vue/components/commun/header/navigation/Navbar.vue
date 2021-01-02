<template>
  <div>
    <div class="flex items-center mr-2 md:hidden">
      <button
        id="button-menu"
        class="inline-flex justify-center items-center p-2 text-gray-400 rounded-md transition duration-150 ease-in-out hover:text-white hover:bg-gray-700 focus:outline-none"
        aria-label="Main menu"
        aria-expanded="false"
        @click="toggle"
      >
        <svg
          class="block w-6 h-6"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
        <svg
          class="hidden w-6 h-6"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </button>
    </div>

    <div class="hidden mr-2 md:ml-6 md:flex md:items-center">
      <router-link
        class="py-2 px-1 font-medium leading-5 text-gray-300 rounded-md transition duration-150 ease-in-out lg:px-3 lg:text-lg hover:text-white hover:bg-gray-700 focus:outline-none"
        to="/home"
        exact
      >
        Accueil
      </router-link>
      <router-link
        class="py-2 px-1 ml-4 font-medium leading-5 text-gray-300 rounded-md transition duration-150 ease-in-out lg:px-3 lg:text-lg hover:text-white hover:bg-gray-700 focus:outline-none"
        to="/informations"
      >
        Informations
      </router-link>
      <router-link
        class="py-2 px-1 ml-4 font-medium leading-5 text-gray-300 rounded-md transition duration-150 ease-in-out lg:px-3 lg:text-lg hover:text-white hover:bg-gray-700 focus:outline-none"
        to="/photos"
      >
        Photos
      </router-link>
      <router-link
        class="py-2 px-1 ml-4 font-medium leading-5 text-gray-300 rounded-md transition duration-150 ease-in-out lg:px-3 lg:text-lg hover:text-white hover:bg-gray-700 focus:outline-none"
        to="/contact"
      >
        Contact
      </router-link>
    </div>

    <div
      id="mobile-menu"
      class="hidden absolute right-0 top-4 z-10 w-full border-t border-gray-700 md:hidden"
    >
      <div class="px-2 pt-2 pb-3 bg-gray-800 sm:px-3">
        <router-link
          class="block py-2 px-3 text-2xl font-medium text-white rounded-md transition duration-150 ease-in-out hover:bg-gray-700 focus:outline-none"
          to="/"
          @click="toggle"
        >
          Accueil
        </router-link>
        <router-link
          class="block py-2 px-3 mt-1 text-2xl font-medium text-gray-300 rounded-md transition duration-150 ease-in-out hover:text-white hover:bg-gray-700 focus:outline-none"
          to="/informations"
          @click="toggle"
        >
          Informations
        </router-link>
        <router-link
          class="block py-2 px-3 mt-1 text-2xl font-medium text-gray-300 rounded-md transition duration-150 ease-in-out hover:text-white hover:bg-gray-700 focus:outline-none"
          to="/photos"
          @click="toggle"
        >
          Photos
        </router-link>
        <router-link
          class="block py-2 px-3 mt-1 text-2xl font-medium text-gray-300 rounded-md transition duration-150 ease-in-out hover:text-white hover:bg-gray-700 focus:outline-none"
          to="/contact"
          @click="toggle"
        >
          Contact
        </router-link>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "Navbar",
  methods: {
    toggle: () => {
      document.getElementById("mobile-menu")?.classList.toggle("hidden");
      document.getElementById("button-menu")?.classList.toggle("bg-gray-700");
      document.getElementById("button-menu")?.classList.toggle("text-white");
    }
  }
});
</script>

<style lang="scss" scoped>
.active {
  @apply bg-gray-900;
  &:hover {
    @apply bg-gray-900;
  }
}
</style>
