import DescriptionAPI from "../api/description";

const FETCHING_DESCRIPTIONS = "FETCHING_DESCRIPTIONS",
  FETCHING_DESCRIPTIONS_SUCCESS = "FETCHING_DESCRIPTIONS_SUCCESS",
  FETCHING_DESCRIPTIONS_ERROR = "FETCHING_DESCRIPTIONS_ERROR";

export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    descriptions: []
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
    hasDescriptions(state) {
      return state.descriptions.length > 0;
    },
    descriptions(state) {
      return state.descriptions;
    }
  },
  mutations: {
    [FETCHING_DESCRIPTIONS](state) {
      state.isLoading = true;
      state.error = null;
      state.descriptions = [];
    },
    [FETCHING_DESCRIPTIONS_SUCCESS](state, descriptions) {
      state.isLoading = false;
      state.error = null;
      state.descriptions = descriptions;
    },
    [FETCHING_DESCRIPTIONS_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
      state.descriptions = [];
    }
  },
  actions: {
    async findAll({ commit }) {
      commit(FETCHING_DESCRIPTIONS);
      try {
        let response = await DescriptionAPI.findAll();
        commit(FETCHING_DESCRIPTIONS_SUCCESS, response.data);
        console.log(response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_DESCRIPTIONS_ERROR, error);
        return null;
      }
    }
  }
};