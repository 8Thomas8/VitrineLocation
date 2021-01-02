<template>
  <div class="w-full bg-gray-200 min-h-window">
    <div class="py-2 px-4 mx-auto max-w-screen-xl sm:px-6 md:py-10 md:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2
          class="mt-4 text-4xl font-extrabold tracking-tight text-gray-900 md:text-5xl"
        >
          Contactez-nous
        </h2>
        <p class="mt-4 leading-7 text-gray-500 text-md md:text-lg">
          Une question, un renseignement ? N'hésitez pas à nous contacter.
        </p>
      </div>

      <div class="p-8 mt-4 mt-6 text-gray-900 bg-white rounded-lg shadow-2xl">
        <form
          id="contact"
          action="/something"
          method="post"
          novalidate="true"
          class="mx-auto max-w-2xl"
          @submit="checkForm"
        >
          <div class="flex flex-col justify-between md:flex-row">
            <div class="flex flex-col md:w-1/2 md:mr-2">
              <label
                class="pl-4 text-lg font-semibold"
                for="lastname"
              >Nom*</label>
              <input
                id="lastname"
                v-model="lastname"
                class="py-2 px-4 bg-gray-200 rounded-lg border border-gray-400"
                type="text"
                name="lastname"
                placeholder="Entrez votre nom"
                required
              >
            </div>

            <div class="flex flex-col md:w-1/2 md:ml-2">
              <label
                class="pl-4 text-lg font-semibold"
                for="firstname"
              >Prénom*</label>
              <input
                id="firstname"
                v-model="firstname"
                class="py-2 px-4 bg-gray-200 rounded-lg border border-gray-400"
                type="text"
                name="firstname"
                placeholder="Entrez votre prénom"
              >
            </div>
          </div>

          <div class="flex flex-col mt-4 md:w-2/3">
            <label
              class="pl-4 text-lg font-semibold"
              for="email"
            >Email*</label>
            <input
              id="email"
              v-model="email"
              class="py-2 px-4 bg-gray-200 rounded-lg border border-gray-400"
              type="email"
              name="email"
              placeholder="Entrez votre adresse email"
              required
            >
          </div>

          <div class="flex flex-col mt-4 md:w-2/3">
            <label
              class="pl-4 text-lg font-semibold"
              for="subject"
            >Sujet*</label>
            <input
              id="subject"
              v-model="subject"
              class="py-2 px-4 bg-gray-200 rounded-lg border border-gray-400"
              placeholder="Entrez le sujet de votre message"
              type="text"
              name="subject"
              required
            >
          </div>

          <div class="flex flex-col mt-4">
            <label
              class="pl-4 text-lg font-semibold"
              for="content"
            >Message*</label>
            <textarea
              id="content"
              v-model="content"
              class="overflow-auto py-2 px-4 h-64 bg-gray-200 rounded-lg border border-gray-400 resize-none"
              name="content"
              placeholder="Saisissez le contenu de votre message"
              required
            />
          </div>

          <div
            v-if="errors.length"
            class="mt-4 w-full italic text-center text-red-600 md:text-left"
          >
            <span class="font-bold text-md">Erreur(s):</span>
            <ul>
              <li
                v-for="error in errors"
                :key="error"
                class="text-sm"
              >
                {{ error }}
              </li>
            </ul>
          </div>

          <input
            class="block py-2 px-10 mx-auto mt-6 font-semibold bg-gray-200 rounded-lg border border-yellow-600 hover:text-white hover:bg-yellow-600 focus:outline-none"
            type="submit"
            value="Envoyer"
          >
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  name: "Contact",
  data() {
    return {
      errors: [""],
      lastname: null,
      firstname: null,
      email: null,
      subject: null,
      content: null
    };
  },
  methods: {
    validEmail: function(email: any) {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    checkForm: function(e: Event) {
      this.errors = [];

      if (!this.lastname) {
        this.errors.push("Nom requis.");
      }
      if (!this.firstname) {
        this.errors.push("Prénom requis.");
      }
      if (!this.email) {
        this.errors.push("Email requis.");
      } else if (!this.validEmail(this.email)) {
        this.errors.push("L'email n'est pas valide.");
      }
      if (!this.subject) {
        this.errors.push("Sujet requis.");
      }
      if (!this.content) {
        this.errors.push("Contenu du message requis");
      }

      if (!this.errors.length) {
        return true;
      }

      e.preventDefault();
    }
  }
});
</script>
