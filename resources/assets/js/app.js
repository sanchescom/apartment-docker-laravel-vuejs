
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
import CreateApartment from './components/CreateApartment.vue';
import DisplayApartment from './components/DisplayApartment.vue';
import EditApartment from './components/EditApartment.vue';

export const app_url = 'http://test-form.d/api/';

const routes = [
    {
        path: '/',
        redirect: '/apartments'
    },
    {
        name: 'CreateApartment',
        path: '/apartments/create',
        component: CreateApartment
    },
    {
        name: 'DisplayApartment',
        path: '/apartments',
        component: DisplayApartment
    },
    {
        name: 'EditApartment',
        path: '/apartments/edit/:id',
        component: EditApartment
    }
];

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'open active',
    routes: routes
});

new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
