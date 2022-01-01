import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Login from './pages/Login.vue';
import About from './pages/About.vue';
import Customer from './pages/Customer.vue';
import Dashboard from './dashboard/Dashboard.vue';
import Logout from './pages/Logout.vue';
import NotFound from './pages/NotFound';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path:'/customer/:id',
            name:'customer',
            component:Customer,
            props:true,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                requiresVisitor: true,
            }
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/404',
            name: '404',
            component: NotFound,
        },
        {
            path: '*',
            redirect: '/404',
        },
    ]
});

export default router;
