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
        axios.post('/api/auth/login', {
          email: credentials.username,
          password: credentials.password,
        })
          .then(response => {
            console.log(response.data[0].access_token)
            let access_token = 'Bearer ' + response.data[0].access_token;
            // this.$cookies.set("default_unit_second","input_value",60 * 60 * 12);
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
          axios.post('/api/auth/logout', '', {
              headers: { Authorization: "Bearer " + context.state.token }
            })
            .then(response => {
              console.log(response)
            //   this.$cookies.remove("access_token");
              localStorage.removeItem('access_token')
              context.commit('destroyToken')

              resolve(response)
            })
            .catch(error => {
              console.log(error)
            //   this.$cookies.remove("access_token");
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
