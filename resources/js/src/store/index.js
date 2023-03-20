import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    database: [],
    keywords: [],
    Workstask: []
  },
  mutations: {
    //****User control******\\

    // task
    setWorktask:(state, data) => {
      state.Workstask = data;
    },
    // database
    setDatabase: (state, database) => {
      state.database = database;
    },
    addTaks: (state, data) => {
      let newid = state.database[state.database.length - 1].id + 1;
      data.id = newid;
      state.database.push(data);
    },
    setProcessid: ( state, id ) => {
      state.database.map((item) => {
         if(item.id == id) {
          return item.status = 1;
	      }
      })
    },
    // Keywords
    setKeywords: (state, keywords) => {
      state.keywords = keywords;
    },
    
  },
  actions: {
    // test
    async getTestWorks({ commit }) {
      if (this.state.database == '') {
        return await axios.get(`/api/getworktasks/all`)
          .then(res => {
            console.log("successfull to get all Tasks data");
            commit('setWorktask', res.data)
          })
          .catch(error => console.log(error))
      }
    },
    // Database
    async getDatabase({ commit }) {
      if (this.state.database == '') {
        return await axios.get(`/api/getDatabase`)
          .then(res => {
            console.log("successfull to get Data");
            commit('setDatabase', res.data)
          })
          .catch(error => console.log(error))
      }
    },
    async setProcess({ commit }, id) {
      const Id = {
        id: id
      }
      return await axios.post(`/api/process`, Id)
        .then(res => {
          console.log(res.data);
          commit('setProcessid', id);
        })
        .catch(error => console.log(error))
    },
    // keywords
    async getKeywords({ commit }) {
      if (this.state.keywords == '') {
        return await axios.get(`/api/getKeywords`)
          .then(res => {
            console.log(res.data);
            commit('setKeywords', res.data)
          })
          .catch(error => console.log(error))
      }
    },
  },
  modules: {},
})
export default store;
