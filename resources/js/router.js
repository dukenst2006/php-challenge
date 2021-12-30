import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Login from './pages/Login.vue';
import About from './pages/About.vue';
import Customer from './pages/Customer.vue';
import Dashboard from './dashboard/Dashboard.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path:'/customer/:id',
            name:'customer',
            component:Customer,
            props:true,
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/login',
            name: 'login',
            component: Login },
    ]
});

export default router;
