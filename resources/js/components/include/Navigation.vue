<template>
<!-- Navbar -->
<div>
    <v-app id="inspire">
        <v-navigation-drawer right temporary v-model="right" fixed>
            <myCart></myCart>
        </v-navigation-drawer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <!-- Navbar brand -->
            <!-- <a class="navbar-brand text-uppercase" href="#">Navbar</a> -->
            <router-link to="/" class="navbar-brand text-uppercase" style="margin-left: 20px;"><b>Healthwise Pharmacy</b></router-link>
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
                aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <!-- Features -->
                    <li class="nav-item dropdown mega-dropdown active" v-for="category in categories" :key="category.id">
                        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">{{ category.name }}
                            <span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu mega-menu v-2 z-depth-1 white-color-dark py-5 px-3" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="row">
                                <div class="sub-menu mb-xl-0 mb-4" style="margin: auto">
                                    <h6 class="sub-title text-uppercase font-weight-bold black-text">{{ category.name }}</h6>
                                    <v-divider></v-divider>
                                    <ul class="list-unstyled">
                                        <li v-for="subCats in category.sub_categories" :key="subCats.id">
                                            <router-link to="/filter" class="menu-item pl-0">
                                                <a class="menu-item pl-0" href="#" style="color: #000;">
                                        <i class="fa fa-caret-right pl-1 pr-3"></i>
                                        <v-btn flat color="black" @click="categoryPro(subCats)">{{ subCats.name }}</v-btn>
                                    </a></router-link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Technology -->
                </ul>
                <a href="/admin#/dashboard" class="v-btn v-btn--flat theme--dark white--text">Admin</a>
                <!-- Links -->
                <v-tooltip bottom>
                    <v-btn icon class="mx-0" @click.stop="right = !right" slot="activator">
                        <v-badge color="orange" left>
                            <span slot="badge">{{ cartItems.length }}</span>
                            <v-icon color="orange darken-2">shopping_cart</v-icon>
                        </v-badge>
                    </v-btn>
                    <span>Cart</span>
                </v-tooltip>
                <!-- Search form -->
                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </form>

            </div>
            <!-- Collapsible content -->

        </nav>
    </v-app>
    <Login></Login>
    <v-snackbar :timeout="timeout" bottom="bottom" :color="Scolor" right="right" v-model="snackbar">
        {{ message }}
        <v-icon dark right>check_circle</v-icon>
    </v-snackbar>
</div>
<!-- Navbar -->
</template>

<script>
import myCart from '../cart/Cart'
import Login from '../login/Login'
export default {
    // router,
    components: {
        Login,
        myCart
    },
    data() {
        return {
            cartItems: [],
            categories: [],
            drawer: true,
            right: null,
            snackbar: false,
            Scolor: '',
            timeout: 5000,
            message: "Success"
        }
    },
    methods: {
        categoryPro(data) {
            // console.log(data)
            axios.post(`/filterProduct/${data.id}`)
                .then(response => {
                    // this.categories = response.data;
                    eventBus.$emit("filterEvent", response.data);
                })
                .catch(error => {
                    // this.loading = false;
                    this.errors = error.response.data.errors;
                });
            // router.go('')
            // this.$router.push(`/filter/${data.id}`)
        },
        getCart() {
            axios.get('/getCart')
                .then((response) => {
                    this.cartItems = response.data
                    eventBus.$emit("cartEvent", response.data);
                })
        }
    },
    mounted() {
        this.getCart()
        axios.get("/categories")
            .then(response => {
                this.categories = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });

    },
    created() {
        eventBus.$on("cartEvent", data => {
            this.cartItems = data;
        });
        eventBus.$on('alertRequest', data => {
            this.showalert()
        })

        this.timer = window.setInterval(() => {
            this.getCart();
            // eventBus.$emit("cartEvent", response.data);
        }, 100000);
    },
}
</script>

<style scoped>
.dropdown:hover .dropdown-menu {
    display: block;
}

.navbar .dropdown-menu {
    width: 250px !important;
}

.navbar-expand-lg {
    position: fixed;
    background: #132f51 !important;
    z-index: 1;
    width: 100%;
    margin-top: -25px;
    padding: 10px 0px;
}
</style>
