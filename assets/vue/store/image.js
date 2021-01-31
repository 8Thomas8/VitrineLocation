import ImageAPI from "../api/image";

const FETCHING_IMAGE = "FETCHING_IMAGE",
  FETCHING_IMAGE_SUCCESS = "FETCHING_IMAGE_SUCCESS",
  FETCHING_IMAGE_ERROR = "FETCHING_IMAGE_ERROR";

export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    images: []
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
    hasImage(state) {
      return state.images.length > 0;
    },
    images(state) {
      return state.images;
    }
  },
  mutations: {
    [FETCHING_IMAGE](state) {
      state.isLoading = true;
      state.error = null;
      state.images = [];
    },
    [FETCHING_IMAGE_SUCCESS](state, images) {
      state.isLoading = false;
      state.error = null;
      state.images = images;
    },
    [FETCHING_IMAGE_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
      state.images = [];
    }
  },
  actions: {
    async findAll({ commit }) {
      commit(FETCHING_IMAGE);
      try {
        let response = await ImageAPI.findAll();
        commit(FETCHING_IMAGE_SUCCESS, response.data);
        console.log(response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_IMAGE_ERROR, error);
        return null;
      }
    }
  }
};