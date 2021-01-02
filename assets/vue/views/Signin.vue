<template>
  <div class="w-full bg-gray-200 min-h-window">
    <div class="py-2 px-4 mx-auto max-w-screen-xl sm:px-6 md:py-10 md:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2
          class="mt-4 text-4xl font-extrabold tracking-tight text-gray-900 md:text-5xl"
        >
          Créer un compte
        </h2>
      </div>

      <div class="p-8 mt-4 mt-6 text-gray-900 bg-white rounded-lg shadow-2xl">
        <form
          id="signin"
          action=""
          method=""
          novalidate="true"
          class="mx-auto max-w-sm"
          @submit.prevent="checkForm"
        >
          <div class="flex flex-col">
            <div class="flex flex-col">
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

            <div class="flex flex-col mt-6">
              <label
                class="pl-4 text-lg font-semibold"
                for="password"
              >Mot de passe*</label>
              <input
                id="password"
                v-model="password"
                class="py-2 px-4 bg-gray-200 rounded-lg border border-gray-400"
                type="password"
                name="password"
                placeholder="Entrez votre mot de passe"
              >
            </div>
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
            value="S'enregister"
          >
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import axios from "axios";

export default Vue.extend({
  name: "Enregistrement",
  data() {
    return {
      errors: [""],
      email: null,
      password: null
    };
  },
  methods: {
    validEmail: function(email: any) {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    checkForm: function(e: Event) {
      this.errors = [];

      if (!this.password) {
        this.errors.push("Mot de passe requis.");
      }
      if (!this.email) {
        this.errors.push("Email requis.");
      } else if (!this.validEmail(this.email)) {
        this.errors.push("L'email n'est pas valide.");
      }

      if (this.email && this.password && !this.errors.length) {
        this.createOne(this.email, this.password);
        return true;
      }

      e.preventDefault();
    },
    createOne: function(email: any, password: any) {
      axios
        .post("http://localhost:8000/register", {
          email: email,
          password: password
        })
        .then(() => {
          this.$router.push("/");
        }, console.error);
    }
  }
});
</script>
