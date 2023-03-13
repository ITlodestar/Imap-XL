import Vue from 'vue'
import Vuex from 'vuex' 
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {
    getDatabase({commit}) {
      console.log("getDatabase");
      return axios.get('api/getDatabase')
      .then(res => {
        console.log(res.data);
      })
    },
  },
  modules: {},
})
