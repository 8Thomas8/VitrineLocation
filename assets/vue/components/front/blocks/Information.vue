<template>
  <div class="pt-12 pb-8 mt-6 bg-white rounded-lg shadow-2xl">
    <h3 class="mx-8 text-3xl font-extrabold tracking-tight text-gray-900">
      {{ category.name }}
    </h3>
    <div
      v-if="category.map"
      class="overflow-hidden self-end mt-6 w-full h-64 border-t border-b border-yellow-600 shadow-xl"
    >
      <Map />
    </div>
    <dl
      class="mx-8 mt-6 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:col-gap-6 sm:row-gap-12 lg:grid-cols-4 lg:col-gap-8"
    >
      <Feature
        v-for="feature in category.features"
        :key="feature.title"
        :title="feature.title"
        :desc="feature.desc"
      />
    </dl>
  </div>
</template>

<script lang="ts">
import Feature from "../Feature.vue";
import Map from "../Map.vue";
import Vue from "vue";


export default Vue.extend({
  name: "Information",
  components: { Feature, Map },
  props: {
    category: {
      type: Object,
      default() {
        return {}
      }
    },
    map: Boolean
  }
});
</script>
