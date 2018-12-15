
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

let myHeader = require('./components/include/Header.vue');
// let myHeaderpartial = require('./components/include/Headerpartial.vue');
let myFooter = require('./components/include/Footer.vue');
let myDash = require('./components/Dashboard.vue');
let myNav = require('./components/include/test.vue');
let myProduct = require('./components/product/Product.vue');
let myHome = require('./components/home/Home.vue');
let myPro = require('./components/admin/products/Products.vue');
let myCategory = require('./components/admin/category/Category.vue');
let mySubCat = require('./components/admin/subcategory/SubCat.vue');
let myOrders = require('./components/admin/orders/Orders.vue');
let myPayment = require('./components/admin/orders/Payment.vue');
let myFilter = require('./components/filter/Filter.vue');
let myPrescription = require('./components/admin/prescription/Prescription.vue');
let myMenu = require('./components/admin/menu/Menu.vue');


const routes = [
    { path: '/example', component: exampleComponent },

    { path: '/', component: myHome },
    { path: '/filter', component: myFilter },
    { path: '/dashboard', component: myDash },
    { path: '/products', component: myProduct },
    { path: '/Adminproducts', component: myPro },
    { path: '/Admincategories', component: myCategory },
    { path: '/AdminSubCat', component: mySubCat },
    { path: '/AdminOrders', component: myOrders },
    { path: '/prescriptions', component: myPrescription },
    { path: '/menu', component: myMenu },
    { path: '/Adminpayments', component: myPayment },
]
const router = new VueRouter({
    // mode: 'history',
    routes // short for `routes: routes`
})
const app = new Vue({
    el: '#app',
    router,
    components: {
        myProduct, myNav, myHome, exampleComponent, myPro, myPrescription, myHeader, myFooter, myMenu,
        myPayment// myHeaderpartial
    },
});
