<template>
  <img
    :src="`/build/images/` + photo.src"
    :title="photo.title"
    :alt="photo.title"
  >
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "Photo",
  props: {
    photo: {
      type: Object,
      default() {
        return {}
      }
    },
  }
});
</script>
