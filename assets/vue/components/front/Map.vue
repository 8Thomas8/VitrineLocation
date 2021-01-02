<template>
  <iframe
    class="w-full h-full"
    frameborder="0"
    scrolling="no"
    marginheight="0"
    marginwidth="0"
    src="https://www.openstreetmap.org/export/embed.html?bbox=-5.2487289905548105%2C36.35725810623971%2C-5.234931707382203%2C36.36486985651088&amp;layer=mapnik"
  />
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "Map"
});
</script>
