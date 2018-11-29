
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.eventBus = new Vue()
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@fortawesome/fontawesome-free/css/all.css' // Ensure you are using css-loader
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)
Vue.use(VueRouter)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// Vue.component('example-component', require('./components/ExampleComponent.vue'));

let exampleComponent = require('./components/ExampleComponent.vue');

let myDash = require('./components/Dashboard.vue');
let myNav = require('./components/include/Nav.vue');
let myHeader = require('./components/include/Header.vue');
let myProduct = require('./components/product/Product.vue');
let myHome = require('./components/home/Home.vue');
let myPro = require('./components/product/ProductB.vue');
let myCategory = require('./components/category/Category.vue');
let myBrand = require('./components/brand/Brand.vue');


const routes = [
    { path: '/example', component: exampleComponent },

    {path: '/', component: myHome },
    {path: '/dashboard', component: myDash },
    { path: '/products', component: myProduct },
    { path: '/Adminproducts', component: myPro },
    { path: '/Admincategories', component: myCategory },
    { path: '/AdminBrand', component: myBrand },
]
const router = new VueRouter({
    // mode: 'history',
    routes // short for `routes: routes`
})
const app = new Vue({
    el: '#app',
    router,
    components: {
        myProduct, myNav, myHome, exampleComponent, myPro, myCategory, myBrand, myDash, myHeader
    },
});
 