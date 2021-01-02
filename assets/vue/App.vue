<template>
  <div class="flex flex-col">
    <AppHeader class="self-start w-full" />
    <router-view class="h-full" />
    <AppFooter class="self-end w-full" />
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import AppHeader from "./components/commun/header/Header.vue";
import AppFooter from "./components/commun/footer/Footer.vue";

export default Vue.extend({
  name: "App",
  components: { AppHeader, AppFooter }
});
</script>
