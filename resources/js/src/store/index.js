import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import router from '../router'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    users: [],
    database: [],
    keywords: [],
    Workstask: [],
    settings: []
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
      let startid = state.keywords[state.keywords.length - 1].id + 1;

      keyword.forEach(element => {
        let newkeyword = { id: startid, keyword: element, user_id: 1 };
        state.keywords.push(newkeyword);
        startid++;
      });

      console.log(state.keywords);
    },
    deleteKeywords: (state, data) => {
      let index = state.keywords.findIndex(keyword => keyword.id == data.id);
      state.keywords.splice(index, 1);
    },

    //****Admin control******\\
    addUser: (state, user) => {
      state.users.push(user);
    },
    setUsers: (state, users) => {
      state.users = users;
    },
    // settgins
    setSettings: (state, settings) => {
      state.settings = settings;
    },
    updateSetting: (state, data) => {
      state.settings.find((item) => {
        item.id === data.id ? item.value = data.value : item.value;
      });
    }
  },
  actions: {
    // test
    async getTestWorks({ commit }) {
      if (this.state.database == '') {
        return await axios.get(`/api/getworktasks/all`)
          .then(res => {
            console.log("successfull: to get all Tasks data");
            // console.log(res.data);
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
    async addKeywords({ commit }, keywords) {
      return await axios.post(`/api/addKeywords`, keywords)
        .then(res => {
          console.log(res.data);
          commit('addKeywords', keywords.newkeys);
        })
        .catch(error => console.log(error))
    },
    async deletekeyword({ commit }, keyid) {

      return await axios.post(`/api/deleteKeywords`, keyid)
        .then(res => {
          commit('deleteKeywords', keyid);
        })
        .catch(error => console.log(error))
    },

    //****Admin control******\\
    // Users page
    async getusers({ commit }, username) {
      return await axios.get(`/api/getUser`)
        .then(res => {
          commit('setUsers', res.data);
          console.log("Success: to get users");
        })
        .catch(error => console.log(error))
    },
    async addUser({ commit }, username) {
      return await axios.post(`/api/addUser`, { username: username })
        .then(res => {
          commit('addUser', res.data);
          console.log(res.data);
        })
        .catch(error => console.log(error))
    },
    // settings page
    async getSettings({ commit }) {
      return await axios.get(`/api/getallsettings`)
        .then(res => {
          commit('setSettings', res.data);
          console.log("Success: to get getSettings");
        })
        .catch(error => console.log(error))
    },

    async editSettings({ commit }, data) {
      commit('updateSetting', data);
      return await axios.post(`/api/editsetting`, data)
        .then(res => {
          commit('updateSetting', res.data);
          console.log(res.data);
        })
        .catch(error => console.log(error))
    },

    //- Login
    async userlogin({ commit }, userinfo) {
      return await axios.post(`/api/login`, userinfo )
      .then(res => {
        if(res.data == -2) {
          console.log("There isn't user registed");
        } else if(res.data == -1) {
          console.log("Password is wrong");
        } else {
          localStorage.setItem('username', userinfo.username );
          localStorage.setItem('role', res.data );

          router.push({name: "dashboard"});
        }
      })
      .catch(error => console.log(error));
    }
  },
  modules: {},
})
export default store;
