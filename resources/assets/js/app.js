
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
import BootstrapVue from 'bootstrap-vue';

import App from './App.vue';
import CreateApartment from './components/CreateApartment.vue';
import DisplayApartment from './components/DisplayApartment.vue';
import EditApartment from './components/EditApartment.vue';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export const app_url = 'http://testform.d:8091/api/';

const VueInputMask = require('vue-inputmask').default;

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
Vue.use(BootstrapVue);
Vue.use(VueInputMask);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'open active',
    routes: routes
});

new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
