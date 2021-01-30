<template>
  <div class="pt-12 pb-8 mt-6 bg-white rounded-lg shadow-2xl">
    <h3 class="mx-8 text-3xl font-extrabold tracking-tight text-gray-900">
      {{ name }}
    </h3>
    <div
      v-if="map"
      class="overflow-hidden self-end mt-6 w-full h-64 border-t border-b border-yellow-600 shadow-xl"
    >
      <Map />
    </div>
    <div v-if="!loading">
      <dl
        class="mx-8 mt-6 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:col-gap-6 sm:row-gap-12 lg:grid-cols-4 lg:col-gap-8"
      >
        <Feature
          v-for="feature in sortedFeatures"
          :key="feature"
          :title="feature.title"
          :desc="feature.message"
        />
      </dl>
    </div>

    <div
      v-else
      class="py-16 mx-auto w-16"
    >
      <svg
        id="dots"
        class="object-contain w-full h-full"
        viewBox="0 0 132 58"
        version="1.1"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
      >
        <!-- Generator: Sketch 3.5.1 (25234) - http://www.bohemiancoding.com/sketch -->
        <title>dots</title>
        <desc>Created with Sketch.</desc>
        <defs />
        <g
          id="Page-1"
          stroke="none"
          stroke-width="1"
          fill="none"
          fill-rule="evenodd"
          sketch:type="MSPage"
        >
          <g
            id="dots"
            sketch:type="MSArtboardGroup"
            fill="#A3A3A3"
          >
            <circle
              id="dot1"
              sketch:type="MSShapeGroup"
              cx="25"
              cy="30"
              r="13"
            />
            <circle
              id="dot2"
              sketch:type="MSShapeGroup"
              cx="65"
              cy="30"
              r="13"
            />
            <circle
              id="dot3"
              sketch:type="MSShapeGroup"
              cx="105"
              cy="30"
              r="13"
            />
          </g>
        </g>
      </svg>
    </div>
  </div>
</template>

<script lang="ts">
import Feature from "../Feature.vue";
import Map from "../Map.vue";
import Vue from "vue";


export default Vue.extend({
  name: "Information",
  components: {Feature, Map},
  props: {
    name: "",
    features: {},
    map: Boolean,
    loading: Boolean,
  },
  computed: {
    sortedFeatures() {
      return this.features.sort((a, b) => a.order - b.order);
    },
  }
});
</script>

<style>
#dots #dot1 {
  animation: load 1s infinite;
}

#dots #dot2 {
  animation: load 1s infinite;
  animation-delay: 0.2s;
}

#dots #dot3 {
  animation: load 1s infinite;
  animation-delay: 0.4s;
}

@keyframes load {
  0% {
    @apply opacity-0;
  }
  50% {
    @apply opacity-100;
  }
  100% {
    @apply opacity-0;
  }
}
</style>