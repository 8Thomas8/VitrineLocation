import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Informations from "../views/Informations.vue";
import Photos from "../views/Photos.vue";
import Contact from "../views/Contact.vue";
import Login from "../views/Login.vue";
import Signin from "../views/Signin.vue";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  linkActiveClass: "active", // active class for non-exact links.
  linkExactActiveClass: "active", // active class for *exact* links.
  routes: [
    {
      path: "/home",
      name: "Accueil",
      component: Home
    },
    {
      path: "/informations",
      name: "Informations",
      component: Informations
    },
    {
      path: "/photos",
      name: "Photos",
      component: Photos
    },
    {
      path: "/contact",
      name: "Contact",
      component: Contact
    },
    {
      path: "/login",
      name: "Login",
      component: Login
    },
    {
      path: "/signin",
      name: "Signin",
      component: Signin
    },
    {
      path: "*",
      redirect: "/home"
    }
  ]
});