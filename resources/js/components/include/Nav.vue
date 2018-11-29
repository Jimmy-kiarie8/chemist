<template>
<div>
    <v-app id="inspire">
        <!-- temporary -->
        <v-navigation-drawer right temporary v-model="right" fixed>
            <my-cart></my-cart>
        </v-navigation-drawer>
        <v-toolbar dark app color="indigo" :clipped-left="$vuetify.breakpoint.lgAndUp" fixed>
            <v-toolbar-title style="width: 600px" class="ml-0 pl-3">
                <v-toolbar-side-icon></v-toolbar-side-icon>
                Chemist
                <!-- <img src="storage/logo1.jpg" alt="" style="width: 60px; height: 60px; border-radius: 25%;"> -->
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- <v-divider vertical></v-divider> -->
            <a href="/admin#/dashboard">Admin</a>
            <v-tooltip bottom>
                <v-btn icon class="mx-0" @click.stop="right = !right" slot="activator">
                    <v-badge color="orange" left>
                        <span slot="badge">{{ cartItems.length }}</span>
                        <v-icon color="orange darken-2">shopping_cart</v-icon>
                    </v-badge>
                </v-btn>
                <span>Cart</span>
            </v-tooltip>
            <v-divider vertical></v-divider>
            <!-- <chattyNoty :user="user"></chattyNoty> -->
            <!-- <v-icon @click.stop="right = !right" style="cursor: pointer">apps</v-icon> -->
            <form action="/logout" method="post">
                <v-btn flat color="white" type="submit">Logout</v-btn>
            </form>
        </v-toolbar>
    </v-app>
</div>
</template>

<script>
import myCart from '../cart/Cart'
export default {
    components: {
        myCart
    },
    data() {
        return {
            drawer: true,
            right: null,
            cartItems: [],
        }
    },
    created() {
        eventBus.$on("cartEvent", data => {
            this.cartItems = data;
        });
    },
    mounted() {
        axios.get('getCart')
            .then((response) => {
                this.cartItems = response.data
            })
    },
}
</script>

<style>

</style>
