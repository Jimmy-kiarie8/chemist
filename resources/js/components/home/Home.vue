<template>
<div class="container-fluid">
    <v-app>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> --> 
            <div class="carousel-inner" id="container">
                <div class="carousel-item active">
                    <div class="image-container">
                        <img class="d-block w-100" :src="singleP.image" alt="First slide">
                        <!-- <img class="d-block w-100" src="storage/products/product1.jpg" alt="First slide"> -->
                        <div class="after"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="wow fadeInUp" data-wow-delay="0.8s"><strong>{{ singleP.name }}</strong></h1>
                            <v-divider></v-divider>
                            <p class="wow fadeInUp" data-wow-delay="1.2s"><b>{{ singleP.description }}</b></p>
                            <p class="wow fadeInUp" data-wow-delay="1.6s">For only {{ singleP.price }}</p>
                            <v-btn @click="view(singleP)" raised color="primary" data-wow-delay="2.0s">See Item</v-btn>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" v-for="product in headerPro" :key="product.id">
                    <div class="image-container">
                        <img class="d-block w-100" :src="product.image" alt="First slide">
                        <!-- <img class="d-block w-100" src="storage/products/product2.jpg" alt="First slide"> -->
                        <div class="after"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="wow fadeInUp" data-wow-delay="0.8s"><strong>{{ product.name }}</strong></h1>
                            <v-divider></v-divider>
                            <p class="wow fadeInUp" data-wow-delay="1.2s"><b>{{ product.description }}</b></p>
                            <p class="wow fadeInUp" data-wow-delay="1.6s">For only {{ product.price }}</p>
                            <v-btn @click="view(product)" raised color="info" class="wow flipInY" data-wow-delay="2.0s">See Item</v-btn>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <myProduct></myProduct>

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <v-layout wrap>
                        <v-flex sm4 v-for="pro in singleT.data" :key="pro.id">
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
                        <v-flex sm4 v-for="item in singleTN.data" :key="item.id">
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
    </v-app>
</div>
</template>

<script>
import myShow from './Show'
import myProduct from '../product/Product'
// let myShow = './Show.vue'
export default {
    components: {
        myShow,
        myProduct
    },
    data() {
        return {
            singleP: [],
            singleT: [],
            singleTN: [],
            headerPro: [],
        }
    },
    methods: {

        addToCart(cart) {
            // console.log(cart)
            axios
                .post(`cart/${cart}`)
                .then(response => {
                    eventBus.$emit("cartEvent", response.data);
                    // this.cart = response.data
                    this.message = "added";
                    this.snackbar = true;
                })
                .catch(error => {
                    this.loading = false;
                    this.errors = error.response.data.errors;
                });
        },

        view(product) {
            eventBus.$emit("viewProEvent", product);
        },
    },
    mounted() {
        axios
            .get("getTP")
            .then(response => {
                this.singleT = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });

        axios
            .get("getsP")
            .then(response => {
                this.singleP = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });

        axios
            .get("getTP?page=2")
            .then(response => {
                this.singleTN = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });

        axios
            .get("headerPro")
            .then(response => {
                this.headerPro = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });
    },
    created() {
        eventBus.$on("addCartEvent", data => {
            this.addToCart(data)
        });
    }
};
</script>

<style scoped>
.carousel-caption {
    margin-bottom: 200px;
    width: 30%;
    /* color: #000; */
}

#container {
    position: relative;
    width: 100%;
    height: 100%;
}

#container.after {
    position: absolute;
    color: #000;
    display: block;
}

#container:hover.after {
    display: block;
    background: rgba(0, 0, 0, 6);
}

.image-container {
    position: relative;
    height: 700px;
    width: 100%;
    background: rgba(0, 0, 0, 0.45);
}

.image-container .after {
    position: absolute;
    top: 0;
    left: 0;
    height: 700px;
    width: 100%;
    display: block;
    color: #FFF;
    background: rgba(0, 0, 0, 0.45);
}

.image-container:hover .after {
    display: block;
    background: rgba(0, 0, 0, 0.45);
}
</style>
