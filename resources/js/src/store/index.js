import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    database: [],
    keywords: []
  },
  mutations: {
    // User control
    setDatabase: (state, database) => {
      state.database = database;
    },
    setKeywords: (state, keywords) => {
      state.keywords = keywords;
    },
    addTaks: (state, data) => {
      state.database.push(data)
    }
  },
  actions: {
    async getDatabase({ commit }) {
      if (this.state.database == '') {
        return await axios.get(`/api/getDatabase`)
          .then(res => {
            commit('setDatabase', res.data)
          })
          .catch(error => console.log(error))
      }
    },
    async getKeywords({ commit }) {
      if (this.state.keywords == '') {
        return await axios.get(`/api/getKeywords`)
          .then(res => {
            console.log(res.data);
            commit('setKeywords', res.data)
          })
          .catch(error => console.log(error))
      }
    }

  },
  modules: {},
})
