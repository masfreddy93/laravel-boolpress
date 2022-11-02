window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import App from './views/App';
import Home from './pages/Home';
import AboutUs from './pages/AboutUs';
import ContactUs from './pages/ContactUs';
import Blog from './pages/Blog';


const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/chi-siamo',
        name: 'about-us',
        component: AboutUs,
    },
    {
        path: '/contatti',
        name: 'contact-us',
        component: ContactUs,
    },
    {
        path: '/blog',
        name: 'posts.index',
        component: Blog,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes,
})

const app = new Vue({
    el: '#app',
    render: (h) => h(App),
    router: router
});