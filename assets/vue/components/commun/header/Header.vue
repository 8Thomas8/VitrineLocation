<template>
  <nav class="w-full bg-gray-800">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <AppTitle />
        <Navbar />
      </div>
    </div>
  </nav>
</template>

<script lang="ts">
import Navbar from "./navigation/Navbar.vue";
import AppTitle from "./title/Title.vue";
import Vue from "vue";

export default Vue.extend({
  name: "AppHeader",
  components: { AppTitle, Navbar }
});
</script>
