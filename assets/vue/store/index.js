import Vue from "vue";
import Vuex from "vuex";
import DescriptionModule from "./description";
import AccessModule from "./access";
import PoiModule from "./poi";
import ImageModule from "./image";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    description: DescriptionModule,
    access: AccessModule,
    poi: PoiModule,
    image: ImageModule
  }
});
