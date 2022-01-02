import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    token: localStorage.getItem('access_token') || null
  },
  getters: {
    loggedIn(state) {
      return state.token !== null
    }
  },
  mutations: {
    retrieveToken(state, token) {
      state.token = token
    },
    destroyToken(state) {
      state.token = null
    }
  },
  actions: {
    retrieveToken(context, credentials) {

      return new Promise((resolve, reject) => {
        axios.post('/api/v1/auth/login', {
          email: credentials.username,
          password: credentials.password,
        })
          .then(response => {
            console.log(response.data[0].access_token)
            let access_token = 'Bearer ' + response.data[0].access_token;
            axios.defaults.headers.common['Authorization'] = access_token;
            console.log(response)
            const token = response.data[0].access_token
            localStorage.setItem('access_token', token)
            context.commit('retrieveToken', token)

            resolve(response)
          })
          .catch(error => {
            console.log(error)
            reject(error)
          })
      })

    },
    destroyToken(context) {

      if (context.getters.loggedIn) {

        return new Promise((resolve, reject) => {
          axios.post('/api/v1/user/logout', '', {
              headers: { Authorization: "Bearer " + context.state.token }
            })
            .then(response => {
              localStorage.removeItem('access_token')
              context.commit('destroyToken')

              resolve(response)
            })
            .catch(error => {
              console.log(error)
              localStorage.removeItem('access_token')
              context.commit('destroyToken')

              reject(error)
            })
        })

      }
    }
  }
})

export default store
