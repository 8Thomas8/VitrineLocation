<template>
  <div class="w-full bg-gray-200 min-h-window">
    <div class="py-2 px-4 mx-auto max-w-screen-xl sm:px-6 md:py-10 md:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2
          class="mt-4 text-4xl font-extrabold tracking-tight text-gray-900 md:text-5xl"
        >
          Les Photographies
        </h2>

        <p class="mt-4 leading-7 text-gray-500 text-md md:text-lg">
          Découvrez les photos de l'appartemment et des alentours.
        </p>
      </div>

      <div class="flex flex-col mt-6 mb-10 md:flex-row">
        <Photo
          v-for="photo in header"
          :key="photo.title"
          :photo="photo"
          class="w-full border-4 border-gray-900 cursor-pointer md:w-7/12"
          @click.native="
            showModal = true;
            modalPhoto = photo;
          "
        />

        <div class="flex flex-row w-1/2 md:flex-col md:w-5/12">
          <Photo
            v-for="photo in secondary"
            :key="photo.title"
            :photo="photo"
            class="border-4 border-gray-900 cursor-pointer"
            @click.native="
              showModal = true;
              modalPhoto = photo;
            "
          />
        </div>
      </div>
      <div class="p-8 mt-4 bg-white rounded-lg shadow-2xl">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
          <Photo
            v-for="photo in normal"
            :key="photo.title"
            :photo="photo"
            class="rounded-lg border-2 border-gray-900 shadow-xl cursor-pointer"
            @click.native="
              showModal = true;
              modalPhoto = photo;
            "
          />
        </div>
      </div>
    </div>
    <ModalPhoto
      v-if="showModal"
      :modal-photo="modalPhoto"
      @click.native="
        showModal = false;
        modalPhoto = null;
      "
    />
  </div>
</template>

<!--TODO: This is how to loop on images-->
<!--<img-->
<!--    v-for="image in images"-->
<!--    :src="'uploads/' + image.file"-->
<!--&gt;-->

<script lang="ts">
import Photo from "../components/front/Photo.vue";
import ModalPhoto from "../components/front/modals/ModalPhoto.vue";
import Vue from "vue";

export default Vue.extend({
  name: "Photos",
  components: {Photo, ModalPhoto},
  data() {
    return {
      showModal: false,
      header: {
        photo1: {
          title: "Photo 1!!",
          src: "home_bg.jpg"
        }
      },
      secondary: {
        photo1: {
          title: "Photo 1",
          src: "home_bg.jpg"
        },
        photo2: {
          title: "Photo 2",
          src: "home_bg.jpg"
        }
      },
      normal: {
        photo1: {
          title: "Photo 1",
          src: "home_bg.jpg"
        },
        photo2: {
          title: "Photo 2",
          src: "home_bg.jpg"
        },
        photo3: {
          title: "Photo 3",
          src: "home_bg.jpg"
        },
        photo4: {
          title: "Photo 4",
          src: "home_bg.jpg"
        },
        photo5: {
          title: "Photo 5",
          src: "home_bg.jpg"
        }
      },
      modalPhoto: null
    };
  },
  computed: {
    imageLoading() {
      return this.$store.getters["image/isLoading"];
    },
    hasImages() {
      return this.$store.getters["image/hasImage"];
    },
    images() {
      return this.$store.getters["image/images"];
    }
  },
  created() {
    this.$store.dispatch("image/findAll");
  },
});
</script>
