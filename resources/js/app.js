
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
import VueScrollTo from 'vue-scrollto'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
// import '@fortawesome/fontawesome-free/css/all.css' // Ensure you are using css-loader
import 'vuetify/dist/vuetify.min.css'
import VueCarousel from 'vue-carousel';

Vue.use(VueCarousel);
Vue.use(Vuetify)
Vue.use(VueRouter)
Vue.use(VueScrollTo, {
    container: "body",
    duration: 500,
    easing: "ease",
    offset: 0,
    force: true,
    cancelable: true,
    onStart: false,
    onDone: false,
    onCancel: false,
    x: false,
    y: true
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// let exampleComponent = require('./components/ExampleComponent.vue');

let myHeader = require('./components/include/Header.vue');
// let myHeaderpartial = require('./components/include/Headerpartial.vue');
let myFooter = require('./components/include/Footer.vue');
let myDash = require('./components/Dashboard.vue');
let myNav = require('./components/include/Headervue.vue');
let myProduct = require('./components/product/Sliders.vue');
let myHome = require('./components/home/Home.vue');
let myShow = require('./components/home/Show.vue');
let myslider = require('./components/product/Sliders.vue');
let myShop = require('./components/Shop/Shop.vue');
let myCartHome = require('./components/cart/CartHome.vue');
let myAbout = require('./components/about/About.vue');
let myFilter = require('./components/filter/Filter.vue');
let mywishList = require('./components/wish/Wish.vue');
// let myProduct = require('./components/Homepage/Product/Product.vue');

// Admin
let myPro = require('./components/admin/products/Products.vue');
let myCategory = require('./components/admin/category/Category.vue');
let mySubCat = require('./components/admin/subcategory/SubCat.vue');
let myOrders = require('./components/admin/orders/Orders.vue');
let myPayment = require('./components/admin/orders/Payment.vue');
let myPrescription = require('./components/admin/prescription/Prescription.vue');
let myMenu = require('./components/admin/menu/Menu.vue');
let myAdminAbout = require('./components/admin/about/About.vue');
 

const routes = [
    // { path: '/example', component: exampleComponent },

    { path: '/', component: myHome },
    { path: '/filter', component: myFilter },
    { path: '/dashboard', component: myDash },
    { path: '/products', component: myProduct },
    { path: '/prescriptions', component: myPrescription },
    { path: '/menu', component: myMenu },
    { path: '/products', component: myProduct },
    { path: '/shop', component: myShop },
    { path: '/wishList', component: mywishList },
    { path: '/cartHome', component: myCartHome },

    { path: '/about', component: myAbout },

    // Admin
    { path: '/Adminproducts', component: myPro },
    { path: '/Admincategories', component: myCategory },
    { path: '/AdminSubCat', component: mySubCat },
    { path: '/AdminOrders', component: myOrders },
    { path: '/Adminpayments', component: myPayment },
    { path: '/AdminAbout', component: myAdminAbout },

]
const router = new VueRouter({
    // mode: 'history',
    routes // short for `routes: routes`
})
const app = new Vue({
    el: '#app',
    router,
    components: {
        myProduct, myNav, myHome, myPro, myPrescription, myHeader, myFooter, myMenu,
        myPayment, myShow, myslider, myDash, myCategory, myOrders, myShop, myCartHome, 
        myAdminAbout,myAbout,mywishList,
        // myHeaderpartial,
         
    },
});
