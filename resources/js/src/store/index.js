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

    //====== task
    setWorktask: (state, data) => {
      state.Workstask = data;
    },

    //====== database
    setDatabase: (state, database) => {
      state.database = database;
    },
    addTaks: (state, data) => {
      let newid = state.database[state.database.length - 1].id + 1;
      data.id = newid;
      state.database.push(data);
    },
    setProcessid: (state, id) => {
      state.database.map((item) => {
        if (item.id == id) {
          return item.status = 1;
        }
      })
    },

    // ====== Keywords
    setKeywords: (state, keywords) => {
      state.keywords = keywords;
    },
    addKeywords: (state, keyword) => {
      let newid = state.keywords[state.keywords.length - 1].id + 1;
      let newkeyword = { id: newid, keyword: keyword, user_id: 1 };
     
      state.keywords.push(newkeyword);
      console.log(state.keywords);
    },
    deleteKeywords: (state, data) => {
      let index = state.keywords.findIndex(keyword => keyword.id == data.id);
      state.keywords.splice(index, 1);
    },
  },
  actions: {
    // test
    async getTestWorks({ commit }) {
      if (this.state.database == '') {
        return await axios.get(`/api/getworktasks/all`)
          .then(res => {
            console.log("successfull: to get all Tasks data");
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
            console.log("successfull: to get Data");
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
            console.log('getKeyword', res.data);
            commit('setKeywords', res.data)
          })
          .catch(error => console.log(error))
      }
    },
    async addKeywords({ commit }, keyword) {

      return await axios.post(`/api/addKeywords`, keyword)
        .then(res => {
          console.log(res.data);
          commit('addKeywords', keyword.newkey);
        })
        .catch(error => console.log(error))
    },
    async deletekeyword({ commit }, keyid) {
      return await axios.post(`/api/deleteKeywords`, keyid)
        .then(res => {
          commit('deleteKeywords', keyid);
        })
        .catch(error => console.log(error))
    }
  },
  modules: {},
})
export default store;
