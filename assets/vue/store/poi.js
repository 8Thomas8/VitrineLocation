import PoiAPI from "../api/poi";

const FETCHING_POI = "FETCHING_POI",
  FETCHING_POI_SUCCESS = "FETCHING_POI_SUCCESS",
  FETCHING_POI_ERROR = "FETCHING_POI_ERROR";

export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    poiCollection: []
  },
  getters: {
    isLoading(state) {
      return state.isLoading;
    },
    hasError(state) {
      return state.error !== null;
    },
    error(state) {
      return state.error;
    },
    hasPoi(state) {
      return state.poiCollection.length > 0;
    },
    poiCollection(state) {
      return state.poiCollection;
    }
  },
  mutations: {
    [FETCHING_POI](state) {
      state.isLoading = true;
      state.error = null;
      state.poiCollection = [];
    },
    [FETCHING_POI_SUCCESS](state, poiCollection) {
      state.isLoading = false;
      state.error = null;
      state.poiCollection = poiCollection;
    },
    [FETCHING_POI_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
      state.poiCollection = [];
    }
  },
  actions: {
    async findAll({ commit }) {
      commit(FETCHING_POI);
      try {
        let response = await PoiAPI.findAll();
        commit(FETCHING_POI_SUCCESS, response.data);
        console.log(response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_POI_ERROR, error);
        return null;
      }
    }
  }
};