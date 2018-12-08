<template>
<div id="bestSell" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <v-layout wrap>
                        <v-flex sm4 v-for="pro in bestSellF" :key="pro.id">
                            <v-card>
                                <v-card-title>
                                    <img class="d-block w-100" :src="pro.image" alt="First slide" style="height: 400px;width:100%">
                            </v-card-title>
                            </v-card>
                            <v-card-actions>
                                <v-tooltip bottom>
                                    <v-btn icon class="mx-0" slot="activator">
                                        <v-icon color="success darken-2" small>cloud</v-icon>
                                    </v-btn>
                                    <span>Add To wishlist</span>
                                </v-tooltip>
                                <v-spacer></v-spacer>
                                <v-tooltip bottom>
                                    <v-btn icon class="mx-0" slot="activator" @click="view(pro)">
                                        <v-icon color="info darken-2" small>visibility</v-icon>
                                    </v-btn>
                                    <span>See Details</span>
                                </v-tooltip>
                                <v-spacer></v-spacer>
                                <v-tooltip bottom>
                                    <v-btn icon class="mx-0" slot="activator" @click="addToCart(pro.id)">
                                        <v-icon color="orange darken-2" small>shopping_cart</v-icon>
                                    </v-btn>
                                    <span>Add To Cart</span>
                                </v-tooltip>
                            </v-card-actions>
                        </v-flex>
                    </v-layout>
                </div>
                <div class="carousel-item">
                    <v-layout wrap>
                        <v-flex sm4 v-for="item in products" :key="item.id">
                            <v-card>
                                <v-card-title>
                                    <img class="d-block w-100" :src="item.image" alt="First slide" style="height: 400px;width:100%">
                            </v-card-title>
                            </v-card>
                            <v-card-actions>
                                <v-tooltip bottom>
                                    <v-btn icon class="mx-0" slot="activator">
                                        <v-icon color="success darken-2" small>cloud</v-icon>
                                    </v-btn>
                                    <span>Add To wishlist</span>
                                </v-tooltip>
                                <v-spacer></v-spacer>
                                <v-tooltip bottom>
                                    <v-btn icon class="mx-0" slot="activator" @click="view(item)">
                                        <v-icon color="info darken-2" small>visibility</v-icon>
                                    </v-btn>
                                    <span>View product</span>
                                </v-tooltip>
                                <v-spacer></v-spacer>
                                <v-tooltip bottom>
                                    <v-btn icon class="mx-0" slot="activator" @click="addToCart(item.id)">
                                        <v-icon color="orange darken-2" small>shopping_cart</v-icon>
                                    </v-btn>
                                    <span>Add To Cart</span>
                                </v-tooltip>
                            </v-card-actions>
                        </v-flex>
                    </v-layout>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <myShow></myShow>
        </div>
</template>

<script>
export default {
    data() {
        return {
            bestSellF: [],
            bestSellA: [],
            newProF: [],
            newProA: [],
            featuredF: [],
            featuredA: [],
        }
    },
    mounted() {
        axios
            .get("/bestSellF")
            .then(response => {
                this.bestSellF = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });
        axios
            .get("/getProducts")
            .then(response => {
                this.products = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });
        axios
            .get("/newProF")
            .then(response => {
                this.newProF = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });

        // axios
        //     .get("/newProA")
        //     .then(response => {
        //         this.newProA = response.data;
        //     })
        //     .catch(error => {
        //         // this.loading = false;
        //         this.errors = error.response.data.errors;
        //     });

        // axios
        //     .get("/featuredA")
        //     .then(response => {
        //         this.featuredA = response.data;
        //     })
        //     .catch(error => {
        //         // this.loading = false;
        //         this.errors = error.response.data.errors;
        //     });

        axios
            .get("/featuredF")
            .then(response => {
                this.featuredF = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });
    }
}
</script>

<style scoped>
img {
    height: 200px !important;
    width: 200px !important;
}
</style>
