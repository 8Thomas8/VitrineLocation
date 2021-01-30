<template>
  <div class="w-full bg-gray-200 min-h-window">
    <div class="py-2 px-4 mx-auto max-w-screen-xl sm:px-6 md:py-10 md:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2
          class="mt-4 text-4xl font-extrabold tracking-tight text-gray-900 md:text-5xl"
        >
          Les informations
        </h2>
        <p class="mt-4 leading-7 text-gray-500 text-md md:text-lg">
          Retrouvez ici toutes les informations concernant l'appartemment en
          location.
        </p>
      </div>

      <Information
        :features="descriptions"
        :name="'Description'"
        :map="false"
        :loading="descriptionLoading"
      />

      <Information
        :features="poiCollection"
        :name="'Points d\'interêt'"
        :map="false"
        :loading="poiLoading"
      />
      
      <Information
        :features="accessCollection"
        :name="'Accès'"
        :map="true"
        :loading="accessLoading"
      />
    </div>
  </div>
</template>

<script lang="ts">
import Information from "../components/front/blocks/Information.vue";
import Vue from "vue";

export default Vue.extend({
  name: "Informations",
  components: {Information},
  computed: {
    descriptionLoading() {
      return this.$store.getters["description/isLoading"];
    },
    hasDescriptions() {
      return this.$store.getters["description/hasDescriptions"];
    },
    descriptions() {
      return this.$store.getters["description/descriptions"];
    },
    accessLoading() {
      return this.$store.getters["access/isLoading"];
    },
    hasAccess() {
      return this.$store.getters["access/hasAccess"];
    },
    accessCollection() {
      return this.$store.getters["access/accessCollection"];
    },
    poiLoading() {
      return this.$store.getters["poi/isLoading"];
    },
    hasPoi() {
      return this.$store.getters["poi/hasPoi"];
    },
    poiCollection() {
      return this.$store.getters["poi/poiCollection"];
    }
  },
  created() {
    this.$store.dispatch("description/findAll");
    this.$store.dispatch("access/findAll");
    this.$store.dispatch("poi/findAll");
  },
});
</script>
