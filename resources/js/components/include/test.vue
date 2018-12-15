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
                <div class="">
                    <v-menu transition="slide-y-transition" bottom v-for="menu in menus" :key="menu.id">
                        <v-btn slot="activator" color="white" dark flat>
                            {{ menu.name }}
                        </v-btn>
                        <v-layout wrap>
                            <v-flex sm-6 v-for="category in menu.categories" :key="category.id" style="background: #fff;">
                                <v-list two-line subheader style="min-width: 200px;">
                                    <v-subheader>{{ category.name }}</v-subheader>
                                    <v-list-tile v-for="subcats in category.sub_categories" :key="subcats.id" @click="categoryPro(subcats)">
                                        <v-list-tile-title>{{ subcats.name }}</v-list-tile-title>
                                        <!-- <v-list-tile-sub-title  v-for="subcats in category.sub_categories" :key="subcats.id">{{ subcats.name }}</v-list-tile-sub-title> -->
                                        <v-divider></v-divider>
                                    </v-list-tile>
                                </v-list>
                            </v-flex>
                        </v-layout>
                    </v-menu>
                </div>
                <v-spacer></v-spacer>
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
    <v-snackbar :timeout="timeout" :bottom="bottom" :color="Scolor" right="right" v-model="snackbar">
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
            menus: [],
            drawer: true,
            right: null,
            snackbar: false,
            bottom: 'bottom',
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
        },

        showalert() {
            this.message = "success";
            this.Scolor = "black";
            this.snackbar = true;
        },

        loadingalert() {
            this.message = "Adding to cart...";
            this.Scolor = "info";
            this.bottom = "top";
            this.snackbar = true;
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

        axios.get("/menus")
            .then(response => {
                this.menus = response.data;
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
        eventBus.$on('loadingRequest', data => {
            this.loadingalert()
        })

        this.timer = window.setInterval(() => {
            this.getCart();
            // eventBus.$emit("cartEvent", response.data);
        }, 60000);
    },
}
</script>

<style scoped>
.dropdown:hover .dropdown-menu {
    display: block;
}

.navbar .dropdown-menu {
    width: 400px !important;
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
