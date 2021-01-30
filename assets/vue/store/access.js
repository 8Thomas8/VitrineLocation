import AccessAPI from "../api/access";

const FETCHING_ACCESS = "FETCHING_ACCESS",
  FETCHING_ACCESS_SUCCESS = "FETCHING_ACCESS_SUCCESS",
  FETCHING_ACCESS_ERROR = "FETCHING_ACCESS_ERROR";

export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    accessCollection: []
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
    hasAccess(state) {
      return state.accessCollection.length > 0;
    },
    accessCollection(state) {
      return state.accessCollection;
    }
  },
  mutations: {
    [FETCHING_ACCESS](state) {
      state.isLoading = true;
      state.error = null;
      state.accessCollection = [];
    },
    [FETCHING_ACCESS_SUCCESS](state, accessCollection) {
      state.isLoading = false;
      state.error = null;
      state.accessCollection = accessCollection;
    },
    [FETCHING_ACCESS_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
      state.accessCollection = [];
    }
  },
  actions: {
    async findAll({ commit }) {
      commit(FETCHING_ACCESS);
      try {
        let response = await AccessAPI.findAll();
        commit(FETCHING_ACCESS_SUCCESS, response.data);
        console.log(response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_ACCESS_ERROR, error);
        return null;
      }
    }
  }
};