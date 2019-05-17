import Vue from 'vue';
import VueRouter from 'vue-router';

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);

// App
import App from './views/App';

// Views
import Home from './views/Home';
import ProductList from './views/ProductList';
import ProductForm from './views/ProductForm';
import axios from 'axios';

axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.accessToken;

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/cms/',
            name: 'home',
            component: Home
        },
        {
            path: '/cms/product',
            name: 'productList',
            component: ProductList
        },
        {
            path: '/cms/product/form',
            name: 'productForm',
            component: ProductForm
        },
        {
            path: '/cms/product/form/:id',
            name: 'productFormEdit',
            component: ProductForm
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: {App},
    router
});
