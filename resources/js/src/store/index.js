import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    database: []
  },
  mutations: {
    setDatabase: (state, database) => {
      state.database = database;
    }
  },
  actions: {
    async getDatabase({ commit }) {
      if (this.state.database == '') {
        return await axios.get(`/api/getDatabase`)
          .then(res => {
            commit('setDatabase', res.data)
          })
        }
    },
  },
  modules: {},
})
