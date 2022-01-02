/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;

 import router from './router';
 import store from './store'
 import App from './layouts/App.vue';
 import VueLetterAvatar from 'vue-letter-avatar';

 Vue.use(VueLetterAvatar);

 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */

 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('pagination', require('laravel-vue-pagination'));

 import GmapVue from 'gmap-vue'
 import VueCookies from 'vue-cookies'
 Vue.use(VueCookies)

 Vue.use(GmapVue, {
    load: {
      key: 'AIzaSyCTKTjZvwnCLrtOo8jg67nTJ2RDwLS8Yzs',
      libraries: 'places', // This is required if you use the Autocomplete plugin
    },

    installComponents: true
  })
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
  router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!store.getters.loggedIn) {
        next({
          name: 'login',
        })
      } else {
        next()
      }
    } else {
      next()
    }
  })

 const app = new Vue({
     router,
     store,
     el: '#app',
     render: h => h(App)
 });
